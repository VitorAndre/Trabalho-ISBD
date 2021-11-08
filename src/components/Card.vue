<template>
  <div class="navbar cardd">
  <b-card
    :title="plano.nome"
    img-src="https://picsum.photos/600/300/?image=25"
    img-alt="Image"
    img-top
    tag="article"
    style="max-width: 20rem;"
    class="mb-2"
  >
    <b-card-text>
      {{plano.periodo}}
    </b-card-text>

    <b-button href="#" variant="primary">R${{plano.preco.split('.').join(',')}}</b-button>
  </b-card>
  </div>
</template>

<script>
export default {
  name: "HelloWorld",
  props: {
    plano: {
        nome: String,
        periodo: String,
        descricao: String,
        preco: String,
    }
  }
};
</script>

<style lang="scss" scoped>
</style>
