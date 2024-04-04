<!----
<template>
  <AddSalle />
  <div class="card">
      <DataTable
          :value="salles"
          stripedRows
          paginator
          showGridlines
          :rows="10"
          dataKey="id"
          :loading="isLoading"
      >
          <Column field="libelle" header="libellé"></Column>
          <Column field="adresse" header="adresse" sortable></Column>
          <Column field="id" header="Actions" style="min-width: 12rem">
              <template #body="val">
                  <div class="d-flex">
                      <Editsalle :art="val.data" />
                      <button
                          type="button"
                          class="btn btn-warning rounded-circle"
                          @click="deletesalle(val.data.id)"
                      >
                          <span style="color: rgb(245, 5, 5)">
                              <i class="fa-solid fa-trash"></i>
                          </span>
                      </button>
                  </div>
              </template>
          </Column>
      </DataTable>
  </div>
</template>

<script setup>
import api from "../config/api.js";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import { ref, onMounted } from "vue";
import Editsalle from "./Editsalle.vue";
import AddSalle from "./AddSalle.vue";

const salles = ref([]);
const isLoading = ref(true);

const getsalles = async () => {
  try {
      const res = await api.get("/api/salles");
      salles.value = res.data;
      isLoading.value = false;
  } catch (error) {
      console.log(error);
  }
};

const deletesalle = async (id) => {
  if (window.confirm("Etes-vous sûr de vouloir supprimer ?")) {
      try {
          await api.delete(`/api/salles/${id}`);
          getsalles();
      } catch (error) {
          console.log(error);
      }
  }
};

onMounted(() => {
  getsalles();
});
</script>

<style lang="css" scoped>
</style>
--->

<template>
  <div>
    <div v-if="isLoading">
      <h2> Loading .... </h2>
    </div>
    <div v-else class="py-6">
      <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
          <router-link :to="{name: 'AddSalle'}" class="btn btn-outline-light">
            New Salle
          </router-link>
        </div>
      </nav>
      <table class="table table-striped shadow">
        <thead>
          <tr>
            <!--<th scope="col">Image</th>-->
            <th scope="col">libellé</th>
            <th scope="col">adresse</th>
            <!--<th scope="col">View</th>-->
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="sal in salles" :key="sal.id">
            <td>{{ sal['libellé'] }}</td>
            <td>{{ sal.adresse }}</td>
            <td>
              <router-link :to="{ name: 'Editsalle', params: { id: sal.id } }" class="btn btn-outline-primary mx-2">
                <i class="fa-solid fa-pen-to-square"></i>
                Edit
              </router-link>
            </td>
            <td>
              <button class="btn btn-outline-danger mx-2" @click="deletesalle(sal.id)">
                <i class="fa-solid fa-trash-can"></i>
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const salles = ref([]);
const isLoading = ref(true);

const getsalles = async () => {
  try {
    const response = await axios.get("http://localhost:8000/api/salles");
    //salles.value = response.data;
    salles.value = response.data.data;
    isLoading.value = false;
  } catch (error) {
    console.log(error);
  }
}

onMounted(() => {
  getsalles();
});

const deletesalle = async (id) => {
  if (window.confirm("Etes-vous sûr de vouloir supprimer ?")) {
    try {
      await axios.delete(`http://localhost:8000/api/salles/${id}`);
      getsalles();
    } catch (error) {
      console.log(error);
    }
  }
}
</script>

<style lang="scss" scoped>
</style>