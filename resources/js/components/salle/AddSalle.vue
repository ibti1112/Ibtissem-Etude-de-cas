
<template>
  <div class="col-md-6 offset-md-3 border rounded p-4 mt-2 shadow">
    <h4 style="text-align: center; color: brown;">Ajout Salle</h4>
    <form @submit.prevent="addSalle">
      <div class="row">
        <div class="col-md-6">
          <label for="libelle" class="form-label">Libellé</label>
          <input type="text" class="form-control" id="libelle" v-model="salle.libelle">
        </div>
        <div class="col-md-6 ms-auto">
          <label for="adresse" class="form-label">Adresse</label>
          <input type="text" class="form-control" id="adresse" v-model="salle.adresse">
        </div>
      </div>
      <br/>
      <button type="submit" class="btn btn-outline-primary">
        <i class="fa-solid fa-floppy-disk"></i> Enregistrer
      </button>
      <router-link to="/salles" class="btn btn-outline-danger mx-2">
        <i class="fa-solid fa-xmark"></i> Annuler
      </router-link>
    </form>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from 'vue-router';
import axios from 'axios';

const router = useRouter();

const salle = ref({
  libelle: "",
  adresse: ""
});

const addSalle = async () => {
  try {
    // Validation des données côté client
    if (!salle.value.libelle || !salle.value.adresse) {
      throw new Error("Veuillez remplir tous les champs.");
    }

    // Envoyer la requête POST au serveur
    await axios.post("http://localhost:8000/api/salles/", salle.value);
    
    router.push({ name: 'Viewsalle' });
  } catch (error) {
    console.error("Erreur lors de l'ajout de la salle :", error);
    alert("Une erreur s'est produite lors de l'ajout de la salle.");
  }
};
</script>

<style scoped>
</style>