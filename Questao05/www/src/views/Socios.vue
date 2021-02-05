<template>
  <v-row justify="center" class="mt-7">
    <v-col cols="12" sm="10" md="8" lg="6">
      <v-card ref="form">
        <v-card-title>Cadastro de Sócios</v-card-title>
        <v-card-text>
          <v-text-field
            v-model="nomeSocio"
            label="Nome do Completo"
            clearable
            required
            :rules="nameRules"
          ></v-text-field>
          <v-chip-group active-class="primary--text" multiple>
            <v-chip
              v-for="clube in clubes"
              :key="clube.id"
              @click="clubeSelec(clube)"
            >
              {{ clube.name }}
            </v-chip>
          </v-chip-group>
        </v-card-text>
        <v-divider class="mt-3"></v-divider>
        <v-card-actions>
          <v-btn text @click="clear"> Apagar </v-btn>
          <v-btn color="primary" text @click="check"> Enviar </v-btn>
          <v-btn text @click="openPage('/socios/list')">Listar Sócios</v-btn>
          <v-btn text @click="openPage('/clubes')">Listar Clubes</v-btn>
        </v-card-actions>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
import Clubes from "./../services/teams";
import Socios from "./../services/socios";

export default {
  data() {
    return {
      clubes: [],
      nameRules: [
        (v) => !!v || "O Nome é Obrigatório",
        (v) => v.length >= 10 || "Por favor, preencha o nome completo",
      ],
      clube: {
        id: 0,
        nome: "",
      },
      clubeSelected: [],
      nomeSocio: "",
    };
  },
  mounted() {
    this.listClube();
  },
  methods: {
    openPage(url) {
      this.$router.push(url);
    },
    check() {
      if (this.nomeSocio.length >= 10) {
        this.saveSocio();
      } else {
        alert("Nome Inválido");
      }
    },
    listClube() {
      Clubes.list().then((res) => {
        this.clubes = res.data;
        console.log(res.data.name);
      });
    },
    clubeSelec(clube) {
      let ocurrences = this.clubeSelected.find((el) => el.id == clube.id);

      if (ocurrences !== undefined) {
        this.clubeSelected = this.clubeSelected.filter(
          (el) => el.id != clube.id
        );
      } else {
        this.clubeSelected.push(clube);
      }
      console.log(this.clubeSelected);
    },
    saveSocio() {
      const ids = this.clubeSelected.map((el) => el.id);

      Socios.save(this.nomeSocio, ids)
        .then((res) => {
          console.log(res);
          (this.clubeSelected = []), (this.nomeSocio = "");
        })
        .catch((err) => {
          console.log(err);
        });
    },
    clear() {
      (this.clubeSelected = []), (this.nomeSocio = "");
    },
  },
};
</script>

<style>
</style>