<template>
  <div class="home">
    <h1>Compufit</h1>
<!--     <NavBar/>
    <img src="@/assets/academia.jpg" alt=""> -->
    <div class="conteudo">
      <TableEquipamentos />
<!--       <div class="d-flex justify-content-around">
        <Cards />
      </div>
      <Modalidades />
      <TablePessoas /> -->
      <!-- <FormEquipamentos /> -->
      <div class="container text-left">
        <h3>Integrantes do trabalho: </h3>
        Caio Matheus Leite da Silva - caio.silva4@estudante.ufla.br
   <br/>Érick de Castro Silva - erick.silva@estudante.ufla.br
   <br/>Felipe de Oliveira Fernandes - felipe.fernandes4@estudante.ufla.br
   <br/>Jonathas Luis de Sousa - jonathas.sousa@estudante.ufla.br
   <br/>Marco Antônio Magalhães - marco.magalhaes@estudante.ufla.br
   <br/>Vitor André de Oliveira Tenório - vitor.tenorio@estudante.ufla.br
      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
//import NavBar from "@/components/NavBar.vue";
import TableEquipamentos from "@/components/TableEquipamentos.vue";
// import Cards from "@/components/Cards.vue";
// import Modalidades from "@/components/Modalidades.vue";
// import TablePessoas from "@/components/TablePessoas.vue";
//import FormEquipamentos from "@/components/FormEquipamentos.vue";

export default {
  name: "Home",
  components: {
  //  NavBar,
    TableEquipamentos,
    // Cards,
    // Modalidades,
    // TablePessoas,
    //FormEquipamentos
  },
  data: () => ({
    show: false,
  }),
};
</script>
<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap');
.home {
  h1 {
    font-family: 'EB Garamond', serif;
    color: azure;
    padding: 0.9rem;
    font-size: 4rem;
  }
}
/* img {
  background-image: url("../assets/academia.jpg");
      position: absolute;

  
  width: 100vw;
  height: calc(100vh - 5rem);
  filter: brightness(40%)
}
.conteudo {
  position: relative;
} */
</style>