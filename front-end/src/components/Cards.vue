<template>
  <div class="home">
    <div class="d-flex justify-content-around mt-2">
      <Card v-for="plano in planos" :key="plano.nome" :plano="plano" />
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import Card from "@/components/Card.vue";

export default {
  name: "Home",
  components: {
    Card,
  },
  data: () => ({
    show: false,
    planos: [
      {
        periodo: 'Semestral',
        nome: 'Plano 1',
        descricao: 'String',
        preco: '2.50',
      },
      {
        periodo: 'Anual',
        nome: 'Plano 2',
        descricao: 'String',
        preco: '1.0',
      }
    ]
  }),
};
</script>
<style scoped>
</style>