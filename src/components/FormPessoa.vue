
<template>
  <div class="container bg-light">
    <b-form @submit="onSubmit" @reset="onReset" v-if="show">
        <b-form-group id="name" label="Nome:" label-for="name">
            <b-form-input
            id="name"
            v-model="form.nome"
            placeholder="Digite o nome"
            required
            ></b-form-input>
        </b-form-group>
        <b-form-group id="cpf" label="CPF:" label-for="cpf">
            <b-form-input
            id="cpf"
            v-model="form.cpf"
            placeholder="Digite o cpf"
            required
            ></b-form-input>
        </b-form-group>
        <b-form-group id="dataAdmissao" label="Data de admissão:" label-for="dataAdmissao">
            <b-form-datepicker placeholder="Selecione uma data" id="date" v-model="form.dataAdmissao" class="mb-2"></b-form-datepicker>
        </b-form-group>
        <b-form-group id="idade" label="Idade:" label-for="idade">
            <b-form-spinbutton id="idade" v-model="form.idade" min="1" max="100"></b-form-spinbutton>
        </b-form-group>
        <b-form-group id="telefone" label="Telefone:" label-for="telefone">
            <b-form-input
            id="telefone"
            v-model="form.telefone"
            placeholder="Digite o telefone"
            required
            ></b-form-input>
        </b-form-group>
        <b-form-group id="endereco" label="Endereço:" label-for="endereco2">
            <b-form-input
            id="endereco2"
            v-model="form.endereco"
            placeholder="Digite o endereço"
            required
            ></b-form-input>
        </b-form-group>
        <b-form-group v-slot="{ ariaDescribedby }">
            <b-form-radio-group
                id="isCliente"
                v-model="isCliente"
                :aria-describedby="ariaDescribedby"
                name="Funcionário ou cliente"
            >
                <b-form-radio value="true">Cliente</b-form-radio>
                <b-form-radio>Funcionário</b-form-radio>
            </b-form-radio-group>
        </b-form-group>
        <div v-if="isCliente">
            <b-form-group  id="peso" label="Peso:" label-for="peso">
                <b-form-input
                id="peso"
                v-model="form.peso"
                placeholder="Digite o peso"
                required
                ></b-form-input>
            </b-form-group>
            <b-form-group  id="altura" label="Altura:" label-for="altura">
                <b-form-input
                id="altura"
                v-model="form.altura"
                placeholder="Digite o altura"
                required
                ></b-form-input>
            </b-form-group>
        </div>
        <div v-else>
            <b-form-group id="salario" label="Salário:" label-for="salario">
                <b-form-input
                id="salario"
                v-model="form.salario"
                placeholder="Digite o salário"
                required
                ></b-form-input>
            </b-form-group>
            <b-form-group id="dataNascimento" label="Data de nascimento:" label-for="dataNascimento">
                <b-form-datepicker placeholder="Selecione uma data" id="date" v-model="form.dataNascimento" class="mb-2"></b-form-datepicker>
            </b-form-group>
            <b-form-group id="periodoTrabalho" label="Período de trabalho:" label-for="periodoTrabalho">
                <b-form-input
                id="periodoTrabalho"
                v-model="form.periodoTrabalho"
                placeholder="Digite o período de trabalho"
                required
                ></b-form-input>
            </b-form-group>
        </div>
        <b-form-group v-slot="{ ariaDescribedby }">
          <b-form-radio-group
              id="isInstrutor"
              v-model="isInstrutor"
              :aria-describedby="ariaDescribedby"
              name="Instrutor ou recepcionista"
          >
              <b-form-radio value="true">Instrutor</b-form-radio>
              <b-form-radio>Recepcionista</b-form-radio>
          </b-form-radio-group>
        </b-form-group>
        <div v-if="isInstrutor">
          <b-form-group id="cref" label="Cref:" label-for="cref">
              <b-form-input
              id="cref"
              v-model="form.cref"
              placeholder="Digite o cref"
              required
              ></b-form-input>
          </b-form-group>
          <b-form-group id="especializacao" label="Especialização:" label-for="especializacao">
              <b-form-input
              id="especializacao"
              v-model="form.especializacao"
              placeholder="Digite a especialização"
              required
              ></b-form-input>
          </b-form-group>
        </div>
        <div v-else>
          <b-form-group id="tempoDigitacao" label="Tempo de digitação:" label-for="tempoDigitacao">
              <b-form-input
              id="tempoDigitacao"
              v-model="form.tempoDigitacao"
              placeholder="Digite o tempo de digitação"
              required
              ></b-form-input>
          </b-form-group>
        </div>
        <b-button type="submit" variant="primary">Submit</b-button>
<!--         <b-button type="reset" variant="danger">Reset</b-button>
 -->    
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
          nome: '',
          cpf: '',
          dataNascimento: '',
          idade: '',
          telefone: '',
          endereco: '',
          salario: '',
          dataAdmissao: '',
          periodoTrabalho: '',
          peso: '',
          altura: '',
          especializacao: '',
          cref: '',
          tempoDigitacao: ''
        },
        show: true,
        isCliente: true,
        isInstrutor: true
      }
    },
    methods: {
      onSubmit(event) {
        event.preventDefault()
        alert(JSON.stringify(this.form))
      },
      onReset(event) {
        event.preventDefault()
        // Reset our form values
        this.form.email = ''
        this.form.name = ''
        this.form.food = null
        this.form.checked = []
        // Trick to reset/clear native browser form validation state
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      }
    }
  }
</script>