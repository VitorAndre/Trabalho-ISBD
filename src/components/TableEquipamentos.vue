<template>
  <div class="container">
    <b-table
      id="my-table"
      class="bg-light"
      striped
      responsive
      :items="items"
      :fields="fields"
      default
    >
      <template #cell(dataDeAquisicao)="data">
        {{ formataData(data.item.dataDeAquisicao) }}
      </template>
      <template #cell(edit)="data">
        <span v-b-modal="String(data.item.serial)">
          <b-icon
            icon="pencil-square"
            class="icon"
            aria-hidden="true"
            v-b-tooltip.hover
            title="Editar equipamento"
          ></b-icon>
          <ModalFormEquipamentos :item="data.item"/>
        </span>
      </template>
      <template #cell(trash)="data">
        <span v-b-modal="'excluir'+data.item.serial">
          <b-icon
            icon="trash"
            class="icon"
            aria-hidden="true"
            v-b-tooltip.hover
            title="Excluir equipamento"
          ></b-icon>
          <ModalExclusao
            :serial="String(data.item.serial)"
            :message="'Você tem certeza que deseja excluir esse equipamento?'"
            :tipo_modal="'warning'"
            @ok="delEquip(data.item.serial)"
          />
        </span>
      </template>
    </b-table>
    <span v-b-modal="String('add')">
      <b-button>Adicionar</b-button>
      <ModalFormEquipamentos :item="{serial: 'add'}"/>
    </span>
  </div>
</template>
<script>
import ModalExclusao from "@/components/ModalExclusao.vue";
import ModalFormEquipamentos from "@/components/ModalFormEquipamentos.vue";
import moment from 'moment';
import { getEquipamentos, deleteEquipamento } from '@/services/api/Equipamentos.js'

export default {
  components: {
    ModalExclusao,
    ModalFormEquipamentos
  },
  beforeMount() {
    getEquipamentos().then(res => {
      this.items = res.data || [
          { serial: '1', nome: 'Supino', status: 'Bom', dataDeAquisicao: '2021-11-16' },
          { serial: '2', nome: 'Halteres', status: 'Ruim', dataDeAquisicao: '2020-11-16' },
          { serial: '3', nome: 'Esteira', status: 'Bom', dataDeAquisicao: '2021-08-16' },
          { serial: '4', nome: 'Bicicleta', status: 'Bom', dataDeAquisicao: '2021-04-16' }
        ]
    }).catch(err => {
      console.log(err)
      this.items = [
          { serial: '1', nome: 'Supino', status: 'Bom', dataDeAquisicao: '2021-11-16' },
          { serial: '2', nome: 'Halteres', status: 'Ruim', dataDeAquisicao: '2020-11-16' },
          { serial: '3', nome: 'Esteira', status: 'Bom', dataDeAquisicao: '2021-08-16' },
          { serial: '4', nome: 'Bicicleta', status: 'Bom', dataDeAquisicao: '2021-04-16' }
        ]
    })
  },
  data() {
    return {
      fields: [
        {
          key: "serial",
          label: "Serial"
        },
        {
          key: "nome",
          label: "Nome"
        },
        {
          key: "status",
          label: "Status",
        },
        {
          key: "dataDeAquisicao",
          label: "Data de aquisição"
        },
        {
          key: "edit",
          label: ""
        },
        {
          key: "trash",
          label: ""
        }
      ],
      items: []
    };
  },
  methods: {
    formataData(data) {
      return moment(data, 'YYYY-MM-DD').format('DD/MM/YYYY')
    },
    delEquip(serial) {
      deleteEquipamento({serial}).then(res => {
        console.log(res)
      }).catch(err => {
        console.log('Erro: ', err)
      })
    },
  }
};
</script>
<style lang="scss" scoped>

</style>
