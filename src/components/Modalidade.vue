<template>
  <div class="container">
    <b-card bg-variant="dark" text-variant="white" :title="modalidade.nome">
      <b-card-text>
        {{modalidade.descricao}}
      </b-card-text>
<!--       <b-button href="#" variant="primary">Go somewhere</b-button>
 -->    </b-card>
  </div>
</template>

<script>
export default {
  name: "HelloWorld",
  props: {
    modalidade: {
        nome: String,
        descricao: String
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
</style>
