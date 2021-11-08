<template>
  <div class="container">
    <b-table striped hover :items="items" class="bg-light tablee"></b-table>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        items: [
          { Equipamento: 'Supino', Status: 'Bom' },
          { Equipamento: 'Halteres', Status: 'Ruim' },
          { Equipamento: 'Esteira', Status: 'Bom' },
          { Equipamento: 'Bicicleta', Status: 'Bom' }
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