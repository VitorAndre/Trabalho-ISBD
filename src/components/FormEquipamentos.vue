
<template>
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
        <b-button type="submit" variant="primary">Submit</b-button>
    </b-form>
    <b-card class="mt-3" header="Form Data Result">
      <pre class="m-0">{{ form }}</pre>
    </b-card>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        form: {
          serial: '',
          nome: '',
          status: '',
          dataDeAquisicao: '',
        },
        show: true,
      }
    },
    methods: {
      onSubmit(event) {
        event.preventDefault()
        alert(JSON.stringify(this.form))
      }
    }
  }
</script>