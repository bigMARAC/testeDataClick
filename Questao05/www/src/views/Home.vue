<template>
  <v-row justify="center" class="mt-7">
    <v-col cols="12" sm="10" md="8" lg="6">
      <v-card ref="form">
        <v-card-title> Cadastrar Clubes</v-card-title>
        <v-divider></v-divider>
        <v-card-text>
          <v-text-field
            v-model="name"
            label="Nome do Clube"
            clearable
            required
          ></v-text-field>
        </v-card-text>
        <v-divider></v-divider>
        <v-card-actions>
          <v-btn text @click="clear"> Apagar </v-btn>
          <v-btn color="primary" text @click="submit"> Enviar </v-btn>
          <v-btn text @click="openPage('/socios')"> Cadastrar Sócio </v-btn>
          <v-btn text @click="openPage('/clubes')"> Listar Clubes </v-btn>
          <v-btn text @click="openPage('/socios/list')"> Listar Sócios </v-btn>
        </v-card-actions>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
import Teams from "./../services/teams";

export default {
  data: () => ({
    name: "",
  }),

  methods: {
    openPage(url) {
      this.$router.push(url);
    },
    submit() {
      Teams.save(this.name).then(() => {
        alert("Clube salvo com sucesso");
        this.name = "";
      });
    },
    clear() {
      this.name = "";
    },
  },
};
</script>
