import Api from "./Api";

const getEquipamentos = () => {
  return Api().get("/equipamentos.php");
};
const addEquipamento = (form) => {
  let formData = new FormData();
        formData.append('operacao', 'POST')
        formData.append('nome', form.nome)
        formData.append('status', form.status)
        formData.append('serial', form.serial)
        formData.append('dataDeAquisicao', form.dataDeAquisicao)
  return Api().post("/equipamentos.php", formData);
};
const editEquipamento = (form) => {
  let formData2 = new FormData();
        formData2.append('operacao', 'PUT')
        formData2.append('nome', form.nome)
        formData2.append('status', form.status)
        formData2.append('serial', form.serial)
        formData2.append('dataDeAquisicao', form.dataDeAquisicao)
  return Api().post("/equipamentos.php", formData2);
};
const deleteEquipamento = (serial) => {
  let formData3 = new FormData();
  formData3.append('operacao', 'DELETE')
  formData3.append('serial', serial)
  return Api().post("/equipamentos.php", formData3);
};

export { getEquipamentos, addEquipamento, editEquipamento, deleteEquipamento };

