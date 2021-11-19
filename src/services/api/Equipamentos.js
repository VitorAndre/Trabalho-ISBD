import Api from "./Api";

const getEquipamentos = () => {
  return Api().get("/equipamentos.php");
};
const addEquipamento = (form) => {
  let formData = new FormData();
        formData.append('nome', form.nome)
        formData.append('status', form.status)
        formData.append('serial', form.serial)
        formData.append('dataDeAquisicao', form.dataDeAquisicao)
  return Api().post("/equipamentos.php", formData);
};
const editEquipamento = (form) => {
  let formData = new FormData();
        formData.append('nome', form.nome)
        formData.append('status', form.status)
        formData.append('serial', form.serial)
        formData.append('dataDeAquisicao', form.dataDeAquisicao)
  return Api().post("/equipamentos.php", formData);
};
const deleteEquipamento = (serial) => {
  return Api().delete("/equipamentos.php", JSON.stringify(serial));
};

export { getEquipamentos, addEquipamento, editEquipamento, deleteEquipamento };

