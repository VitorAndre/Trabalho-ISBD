<template>
  <div class="home">
    <h1>Compufit</h1>
<!--     <NavBar/>
    <img src="@/assets/academia.jpg" alt=""> -->
    <div class="conteudo">
      <TableEquipamentos />
      <div class="d-flex justify-content-around">
        <Cards />
      </div>
      <Modalidades />
      <TablePessoas />
      <!-- <FormEquipamentos /> -->
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
//import NavBar from "@/components/NavBar.vue";
import Cards from "@/components/Cards.vue";
import TableEquipamentos from "@/components/TableEquipamentos.vue";
import Modalidades from "@/components/Modalidades.vue";
import TablePessoas from "@/components/TablePessoas.vue";
//import FormEquipamentos from "@/components/FormEquipamentos.vue";

export default {
  name: "Home",
  components: {
  //  NavBar,
    Cards,
    TableEquipamentos,
    Modalidades,
    TablePessoas,
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
    padding: 2rem;
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