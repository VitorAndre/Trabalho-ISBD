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
          { Equipamento: 'Dickerson', Status: 'Macdonald' },
          { Equipamento: 'Larsen', Status: 'Shaw' },
          { Equipamento: 'Geneva', Status: 'Wilson' },
          { Equipamento: 'Jami', Status: 'Carney' }
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