<template>
  <AddSpectacle/>
    <h6>Ajout de Spectacle</h6>
    <div class="row">
      <div class="col-md-3">
        <label for="piece" class="form-label">Pièce</label>
        <select class="form-control" v-model="spectacle.idpiece">
          <option v-for="piece in pieces" :key="piece.id" :value="piece.id">{{ piece.nom }}</option>
        </select>
      </div>
      <div class="col-md-3">
        <label for="salle" class="form-label">Salle</label>
        <select class="form-control" v-model="spectacle.idsalle">
          <option v-for="salle in salles" :key="salle.id" :value="salle.id">{{ salle.nom }}</option>
        </select>
      </div>
      <div class="col-md-3">
        <label for="date" class="form-label">Date du Spectacle</label>
        <input type="date" class="form-control" id="date" v-model="spectacle.datespectacle">
      </div>
    </div>
    <br/>
    <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from 'axios';
import AddSpectacle from "./addSpectacle.vue";


const spectacle = ref({});
const salles = ref([]);
const pieces = ref([]);

const getPieces = () => {
  axios.get('http://localhost:8000/api/piece') 
    .then(res => {
      pieces.value = res.data;
    })
    .catch(error => {
      console.error("Erreur lors de la récupération des pièces :", error);
    });
};

const getSalles = () => {
  axios.get('http://localhost:8000/api/salles') 
    .then(res => {
      salles.value = res.data;
    })
    .catch(error => {
      console.error("Erreur lors de la récupération des salles :", error);
    });
};

onMounted(() => {
  getPieces();
  getSalles();
});

const addSpectacle = async () => {
  try {
    await axios.post("http://localhost:8000/api/spectacles", spectacle.value);
    alert("Spectacle ajouté avec succès !");
  } catch (error) {
    console.error("Erreur lors de l'ajout du spectacle :", error);
    alert("Une erreur s'est produite lors de l'ajout du spectacle.");
  }
};
</script>

<style scoped>
</style>