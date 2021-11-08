<template>
  <div class="container">
    <div class="d-flex justify-content-around mt-2">
      <Modalidade v-for="modalidade in modalidades" :key="modalidade.nome" :modalidade="modalidade" />
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import Modalidade from "@/components/Modalidade.vue";

export default {
  name: "Home",
  components: {
    Modalidade
  },
  data: () => ({
    show: false,
    modalidades: [
      {
        nome: 'Modalidade 1',
        descricao: 'String',
      },
      {
        nome: 'Modalidade 2',
        descricao: 'String',
      }
    ]
  }),
};
</script>
<style scoped>
</style>