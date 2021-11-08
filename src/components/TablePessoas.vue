<template>
  <div class="container">
    <b-table striped hover :items="items" class="bg-light"></b-table>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        items: [
          { Nome: 'Dickerson', "Tipo de Pessoa": 'Cliente' },
          { Nome: 'Larsen', "Tipo de Pessoa": 'Instrutor' },
          { Nome: 'Geneva', "Tipo de Pessoa": 'Cliente' },
          { Nome: 'Jami', "Tipo de Pessoa": 'Recepcionista' }
        ]
      }
    }
  }
</script>
<style scoped>
table {
  border-radius: 15px;
}
</style>