<template>
  <div class="home">
    <NavBar/>
    <img src="@/assets/academia.jpg" alt="">
    <div class="conteudo">
      <div class="d-flex justify-content-around">
        <Cards />
      </div>
      <TableEquipamentos />
      <Modalidades />
      <TablePessoas />
      <FormPessoa />
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import NavBar from "@/components/NavBar.vue";
import Cards from "@/components/Cards.vue";
import TableEquipamentos from "@/components/TableEquipamentos.vue";
import Modalidades from "@/components/Modalidades.vue";
import TablePessoas from "@/components/TablePessoas.vue";
import FormPessoa from "@/components/FormPessoa.vue";

export default {
  name: "Home",
  components: {
    NavBar,
    Cards,
    TableEquipamentos,
    Modalidades,
    TablePessoas,
    FormPessoa
  },
  data: () => ({
    show: false,
  }),
};
</script>
<style scoped>
img {
/*   background-image: url("../assets/academia.jpg");
      position: absolute;
 */
  
  width: 100vw;
  height: calc(100vh - 5rem);
  filter: brightness(40%)
}
/* .conteudo {
  position: relative;
} */
</style>