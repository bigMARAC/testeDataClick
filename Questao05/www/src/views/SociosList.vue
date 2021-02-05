<template>
  <v-card class="mx-auto my-8" max-width="700" tile>
    <v-card-title>Lista de Sócios</v-card-title>
    <v-divider></v-divider>
    <v-list-item v-for="socio in socios" :key="socio.id">
      <v-list-item-content>
        <v-list-item-title>{{ socio.name }}</v-list-item-title>
        <v-list-item-subtitle v-for="clube in socio.clubes" :key="clube.id">{{
          clube.name
        }}</v-list-item-subtitle>
      </v-list-item-content>
      <v-list-item-icon>
        <v-icon @click="deleteSocio(socio)" color="error"
          >mdi-delete-circle</v-icon
        >
      </v-list-item-icon>
    </v-list-item>
    <v-divider></v-divider>
    <v-card-actions>
      <v-btn text @click="openPage('/socios')"> Cadastrar Sócio </v-btn>
      <v-btn text @click="openPage('/')"> Cadastrar Clube </v-btn>
      <v-btn text @click="openPage('/clubes')"> Listar </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
import Socios from "./../services/socios";

export default {
  data() {
    return {
      socios: [],
    };
  },
  mounted() {
    this.listSocios();
  },
  methods: {
    openPage(url) {
      this.$router.push(url);
    },
    listSocios() {
      Socios.list().then((res) => {
        this.socios = res.data;
      });
    },
    deleteSocio(socio) {
      Socios.delete(socio.id)
        .then((res) => {
          console.log(res);
          this.listSocios();
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style>
</style>