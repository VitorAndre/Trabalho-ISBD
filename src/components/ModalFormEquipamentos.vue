
<template>
  <b-modal
    modal-class="modal"
    :id="item.serial"
    body-class="modalBodyEquipamentos"
    hide-footer
    hide-header
    size="lg"
  >
    <div class="container bg-light">
      <b-form @submit="onSubmit" v-if="show">
          <b-form-group id="nome" label="Nome:" label-for="nome">
              <b-form-input
              id="nome"
              v-model="form.nome"
              placeholder="Digite o nome"
              required
              ></b-form-input>
          </b-form-group>
          <b-form-group id="serial" label="Serial:" label-for="serial">
              <b-form-input
              id="serial"
              v-model="form.serial"
              placeholder="Digite o serial"
              required
              :readonly="isAdd ? false : true"
              ></b-form-input>
          </b-form-group>
          <b-form-group id="status" label="Status:" label-for="status">
              <b-form-input
              id="status"
              v-model="form.status"
              placeholder="Digite o status"
              required
              ></b-form-input>
          </b-form-group>
          <b-form-group id="dataDeAquisicao" label="Data de aquisição:" label-for="dataDeAquisicao">
              <b-form-datepicker placeholder="Selecione uma data" id="date" v-model="form.dataDeAquisicao" class="mb-2"></b-form-datepicker>
          </b-form-group>
          <b-button type="submit" variant="primary">Enviar</b-button>
      </b-form>
    </div>
  </b-modal>
</template>

<script>
import { addEquipamento, editEquipamento } from '@/services/api/Equipamentos.js'

  export default {
    props: {
      item: {
          serial: '',
          nome: '',
          status: '',
          dataDeAquisicao: '',
        },
    },
    data() {
      return {
        form: {
          serial: '',
          nome: '',
          status: '',
          dataDeAquisicao: '',
        },
        show: true,
        isAdd: false
      }
    },
    mounted() {
      if (this.item){
        if (this.item.serial == 'add') {
          this.isAdd = true
          this.item.serial = ''
        }
        this.form = this.item
      }
    },
    methods: {
      onSubmit(event) {
        event.preventDefault()
        if (this.isAdd) {
          this.adiciona()
        } else {
          this.edita()
        }
        this.$bvModal.hide(this.item.serial);
      },
      adiciona() {
        addEquipamento(this.form).then(res=> {
          if (res) {
            window.location.reload()
          }
        }).catch()
      },
      edita() {
        editEquipamento(this.form).then().catch()
      },     
      hide() {
        this.$emit("cancel");
        this.$bvModal.hide(this.item.serial);
      },
      hidden(evt) {
        if (evt.trigger == "backdrop") this.$emit("hide");
      }
    }
  }
</script>
<style>
.modalBodyEquipamentos {
  height: 100% !important;
}
</style>