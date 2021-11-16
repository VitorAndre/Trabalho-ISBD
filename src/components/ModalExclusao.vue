<template>
  <b-modal
    modal-class="modal"
    :id="'excluir'+serial"
    body-class="modalBody"
    hide-footer
    hide-header
    size="lg"
  >
    <b-row align-h="center" cols="1" class="body">
      <b-col class="icon">
        <b-icon-exclamation-triangle
          variant="danger"
          class="iconSVG"
          v-if="tipo_modal == 'warning'"
        />
        <b-icon v-else icon="check2" class="iconSVG" variant="success"></b-icon>
      </b-col>
      <b-col class="message">{{ message }}</b-col>

      <b-col v-if="tipo_modal == 'warning'">
        <b-row align-h="center" class="buttons">
          <b-col>
            <button class="button float-right" @click="hide()">Cancelar</button>
          </b-col>
          <b-col>
            <button class="button float-left" @click="response">Excluir</button>
          </b-col>
        </b-row>
      </b-col>
      <b-col v-else>
        <b-row align-h="center" class="buttons">
          <b-col>
            <button class="button" align-h="center" @click="response">Fechar</button>
          </b-col>
        </b-row>
      </b-col>
    </b-row>
  </b-modal>
</template>

<style lang="scss">
.modal {
  text-align: center;

  .modalBody {
    background: #fafbff;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    height: 325px;
    border-radius: 5px;
  }
}

.modal-backdrop {
  opacity: 0.2 !important;
  backdrop-filter: blur(10px);
}
</style>

<style lang="scss" scoped>
.row {
  margin: 0;
}

.body {
  .col {
    padding: 0;
  }

  .icon {
    padding-top: 30px;
    .iconSVG {
      width: 80px;
      height: 73px;
    }
  }

  .message {
    font-size: 18px;
    line-height: 140.62%;
    color: #000000;

    padding: 30px 0 50px;
  }

  .buttons {
    font-size: 16px;
    line-height: 21px;

    .button {
      outline: none;
      border: unset;
      margin: 0 4px;
      padding: 8px 10px;
      min-width: 85px;

      border-radius: 3px;
      background: transparent;
      border: 1px solid #cccccc;
      color: #373a3c;
    }
    .col:nth-child(2) {
      .button {
        background: #dc3545;
        color: #fafbff;
        width: 128px;
        height: 38px;
      }
    }
  }
}

@media only screen and (max-width: 580px) {
  .body {
    padding: 0 25px;
    .icon {
      padding-top: 30px;
      .iconSVG {
        width: 50px;
        height: 45px;
      }
    }

    .message {
      font-size: 18px;
      line-height: 25px;

      padding: 30px 0 50px;
    }

    .buttons {
      font-size: 16px;
      line-height: 21px;

      padding-bottom: 17px;

      .button {
        margin: 0 4px;
        padding: 8px 10px;
        min-width: 85px;

        border-radius: 3px;
      }
    }
  }
}
</style>

<script>
/*

  PROPS:
    -> id: id do modal, obrigatorio. !!!! CUIDADO !!!! esse id deve ser unico, recomendo usar algum numero juntamente com o nome para evitar conflito. Para ativar o modal é
       necessário um componente com a propiedade v-b-modal.[ID_DO_MODAL]. Exemplo: No caso dos contatos, foi usado o email de cada um.
    ->message: mensagem de intrução ao usuario, obrigatorio.
    ->tipo_modal: Referente se é um modal de alerta ou de confirmação. Se for o segundo caso, deve ser passado a palavra 'warning', se for o primeiro, não é necessário 
      passar nada

  EVENTOS:
    -> "cancel" quando clica no botão cancelar
    -> "ok" quando clica no botão continuar
    -> "hide" quando clicar fora do modal

*/

export default {
  props: {
    serial: {
      type: String,
      required: true
    },
    message: {
      type: String,
      required: true
    },
    tipo_modal: {
      type: String
    }
  },
  methods: {
    hide() {
      this.$emit("cancel");
      this.$bvModal.hide('excluir' + this.serial);
    },
    response() {
      this.$emit("ok");
      this.$bvModal.hide('excluir' + this.serial);
    },
    hidden(evt) {
      if (evt.trigger == "backdrop") this.$emit("hide");
    }
  }
};
</script>