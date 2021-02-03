<template>
  <v-card class="mx-auto mt-8" max-width="700" tile>
    <v-toolbar color="#222" dark>
      <v-icon class="mr-5" color="#ff5821">mdi-database</v-icon>

      <v-toolbar-title>Lista de Tarefas - DataClick</v-toolbar-title>

      <v-spacer></v-spacer>
      <v-tooltip right>
        <template v-slot:activator="{ on, attrs }">
          <v-btn icon v-bind="attrs" v-on="on">
          <v-icon large @click="newTask()" color="#ff5821">mdi-plus</v-icon>
        </v-btn>
      </template>
        
        <span>Adicionar</span>
      </v-tooltip>
    </v-toolbar>

    <v-divider class="mx-4"></v-divider>

    <v-list-item v-for="task in tasks" :key="task.Id">
      <v-checkbox class="mr-2"></v-checkbox>
      <v-list-item-content>
        <v-list-item-title>{{ task.title }}</v-list-item-title>
        <v-list-item-subtitle>{{ task.description }}</v-list-item-subtitle>
      </v-list-item-content>
      <v-list-item-icon>
        <v-icon @click="editTask(task)">mdi-pencil-circle</v-icon>
      </v-list-item-icon>
      <v-list-item-icon>
        <v-icon @click="deleteTask(task)">mdi-delete-circle</v-icon>
      </v-list-item-icon>
    </v-list-item>

    <v-dialog v-model="dialog" max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">zap</span>
        </v-card-title>

        <v-card-text method="post">
          <v-container>
            <v-row>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  v-model="task.title"
                  label="Nome da Tarefa"
                ></v-text-field>
              </v-col>

              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  v-model="task.priority"
                  label="Prioridade da Tarefa"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-textarea
                  auto-grow
                  v-model="task.description"
                  label="Descrição da Tarefa"
                ></v-textarea>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="close()"> Cancelar </v-btn>
          <v-btn color="blue darken-1" text @click="save()"> Salvar </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-dialog v-model="dialogDelete" max-width="500px" :key="task.Id">
      <v-card>
        <v-card-title class="headline"
          >Você tem certeza que deseja deletar essa Tarefa?</v-card-title
        >
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="closeDelete">Cancel</v-btn>
          <v-btn color="blue darken-1" text @click="deleteTaskConfirm"
            >OK</v-btn
          >
          <v-spacer></v-spacer>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-card>
</template>

<script>
import Tasks from "../services/tasks";
export default {
  data() {
    return {
      dialog: false,
      dialogDelete: false,
      tasks: [],
      task: {
        id: "",
        title: "",
        priority: null,
        description: "",
      },
    };
  },
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "Criar Tarefa" : "Editar Tarefa";
    },
  },
  methods: {
    list() {
      Tasks.list().then((res) => {
        this.tasks = res.data;
      });
    },
    save() {
      if (!this.task.id) {
        Tasks.save(this.task).then((res) => {
          alert("salvo com sucesso");
          this.res = res;
          this.task = {};
          this.list();
          this.dialog = false;
        });
      } else {
        Tasks.update(this.task).then((res) => {
          alert("atualizado com sucesso");
          this.res = res;
          this.task = {};
          this.list();
          this.dialog = false;
        });
      }
    },
    editTask(task) {
      this.task = task;
      console.log(this.task);
      this.dialog = true;
    },
    deleteTask(task) {
      this.dialogDelete = true;
      this.task = task;
    },
    deleteTaskConfirm() {
      Tasks.delete(this.task.id)
        .then((res) => {
          this.list();
          this.res = res;
          this.task = {};
          this.dialogDelete = false;
        })
        .catch((e) => {
          console.log(e);
        });
    },
    closeDelete() {
      this.task = {};
      this.dialogDelete = false;
    },
    close() {
      this.task = {};
      this.dialog = false;
    },
    newTask() {
      this.dialog = true;
    },
  },

  mounted() {
    this.list();
  },
};
</script>

<style>
</style>
