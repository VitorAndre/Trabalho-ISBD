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
        {{ formataData(data) }}
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
            @ok="deleteEquipamento(data.item.serial)"
          />
        </span>
      </template>
    </b-table>
  </div>
</template>
<script>
import ModalExclusao from "@/components/ModalExclusao.vue";
import ModalFormEquipamentos from "@/components/ModalFormEquipamentos.vue";
import moment from 'moment';

export default {
  components: {
    ModalExclusao,
    ModalFormEquipamentos
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
      items: [
          { serial: '1', nome: 'Supino', status: 'Bom', dataDeAquisicao: '2021-11-16' },
          { serial: '2', nome: 'Halteres', status: 'Ruim', dataDeAquisicao: '2020-11-16' },
          { serial: '3', nome: 'Esteira', status: 'Bom', dataDeAquisicao: '2021-08-16' },
          { serial: '4', nome: 'Bicicleta', status: 'Bom', dataDeAquisicao: '2021-04-16' }
        ]
    };
  },
  mounted() {

  },
  methods: {
    formataData(data){
      return moment(data).format('DD/MM/YYYY')
    },
    deleteEquipamento(serial) {
      alert(`Equipamento ${serial} vai ser excluido`)
    },
  }
};
</script>
<style lang="scss" scoped>

</style>
