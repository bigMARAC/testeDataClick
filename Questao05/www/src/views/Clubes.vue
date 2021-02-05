<template>
  <v-card class="mx-auto mt-8" max-width="700" tile>
    <v-card-title> Lista de Clubes </v-card-title>
    <v-divider></v-divider>
    <v-list-item v-for="clube in clubes" :key="clube.id">
      <v-list-item-content>
        <v-list-item-title>{{ clube.name }}</v-list-item-title>
      </v-list-item-content>
      <v-list-item-icon>
        <v-icon @click="deleteClube(clube)" color="error"
          >mdi-delete-circle</v-icon
        >
      </v-list-item-icon>
    </v-list-item>
    <v-divider></v-divider>
    <v-card-actions>
      <v-btn text @click="openPage('/')">Cadastrar Clube</v-btn>
      <v-btn text @click="openPage('/socios')">Cadastrar Sócio</v-btn>
      <v-btn text @click="openPage('/socios/list')">Listar Sócios</v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
import Clubes from "./../services/teams";

export default {
  data() {
    return {
      clubes: [],
      clube: {
        id: 1,
        name: "",
      },
    };
  },
  mounted() {
    this.list();
  },

  methods: {
    openPage(url) {
      this.$router.push(url);
    },
    list() {
      Clubes.list().then((res) => {
        this.clubes = res.data;
        console.log(this.clubes);
      });
    },
    deleteClube(clube) {
      this.clube = clube;
      console.log(this.clube.id);
      Clubes.delete(this.clube.id)
        .then((res) => {
          this.list();
          this.res = res;
          this.clube = {};
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