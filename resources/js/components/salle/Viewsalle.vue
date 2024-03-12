<template>
    <div>
      <div v-if="isLoading">
        <h2>Loading ....</h2>
      </div>
      <div v-else class="py-6">
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
          <div class="container-fluid">
            <router-link :to="{ name: 'AddSalle' }" class="btn btn-outline-light">
              New Salle
            </router-link>
          </div>
        </nav>
        <table class="table table-striped shadow">
          <thead>
            <tr>
              <th scope="col">Libellé</th>
              <th scope="col">Adresse</th>
              <th scope="col">View</th>
              <th scope="col">Modifier</th>
              <th>Supprimer</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="salle in salles" :key="salle.id">
              <td>{{ salle.libelle }}</td>
              <td>{{ salle.adresse }}</td>
              <td>
                <router-link :to="{ name: 'viewSalle', params: { id: salle.id } }" class="btn btn-outline-primary mx-2">
                  <i class="fa-solid fa-eye"></i>
                  View
                </router-link>
              </td>
              <td>
                <router-link :to="{ name: 'editSalle', params: { id: salle.id } }" class="btn btn-outline-primary mx-2">
                  <i class="fa-solid fa-pen-to-square"></i>
                  Edit
                </router-link>
              </td>
              <td>
                <button class="btn btn-outline-danger mx-2" @click="deleteSalle(salle.id)">
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
  import { useRouter } from 'vue-router';

  const salles = ref([]);
  const isLoading = ref(true);
  const router = useRouter();
  
  const getSalles = async () => {
    try {
      const response = await axios.get("http://localhost:8000/api/salles");
      salles.value = response.data;
      isLoading.value = false;
    } catch (error) {
      console.log(error);
    }
  };
  
  const deleteSalle = async (id) => {
    if (window.confirm("Etes-vous sûr de vouloir supprimer ?")) {
      try {
        await axios.delete(`http://localhost:8000/api/salles/${id}`);
        getSalles();
      } catch (error) {
        console.log(error);
      }
    }
  };
  
  onMounted(() => {
    getSalles();
  });
  </script>
  
  <style lang="scss" scoped>
  </style>