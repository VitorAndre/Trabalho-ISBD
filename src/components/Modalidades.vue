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
        nome: 'Musculação',
        descricao: 'Modalidade para ficar monstro',
      },
      {
        nome: 'Natação',
        descricao: 'Modalidade para nadar',
      }
    ]
  }),
};
</script>
<style scoped>
</style>