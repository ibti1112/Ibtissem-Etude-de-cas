<!----<template>
    <form @submit.prevent="addSpectacle">
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
            <option v-for="salle in salles" :key="salle.id" :value="salle.id">{{ salle.libelle }}</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="datespectacle" class="form-label">Date du Spectacle</label>
          <input type="date" class="form-control" id="datespectacle" v-model="spectacle.datespectacle">
        </div>
      </div>
      <br/>
      <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
      <router-link to="/listart" class="btn btn-outline-danger mx-2">
        <i class="fa-solid fa-xmark"></i> Cancel
      </router-link>
    </form>
</template>

<script setup>
import { ref } from 'vue';

const spectacle = ref({
  idpiece: null,
  idsalle: null,
  datespectacle: null
});

const addSpectacle = () => {
  // Logique pour ajouter le spectacle
};
</script>
-->
<!---<template>
    <form @submit.prevent="addSpectacle">
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
            <option v-for="salle in salles" :key="salle.id" :value="salle.id">{{ salle.libelle }}</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="datespectacle" class="form-label">Date du Spectacle</label>
          <input type="date" class="form-control" id="datespectacle" v-model="spectacle.datespectacle">
        </div>
      </div>
      <br/>
      <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
      <router-link to="/salles" class="btn btn-outline-danger mx-2">
        <i class="fa-solid fa-xmark"></i> Cancel
      </router-link>
    </form>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import axios from 'axios';
  
  const spectacle = ref({
    idpiece: null,
    idsalle: null,
    datespectacle: null
  });
  
  const pieces = ref([]);
  const salles = ref([]);
  
  // Méthode pour ajouter un spectacle
  const addSpectacle = async () => {
    try {
      // Envoi de la requête POST vers l'API avec les données du spectacle
      await axios.post('http://localhost:8000/api/spectacle', spectacle.value);
      // Redirection vers une autre page après l'ajout du spectacle
      router.push({ name: 'Viewspectacle' });
    } catch (error) {
      console.error('Erreur lors de l\'ajout du spectacle :', error);
      // Gestion de l'erreur
    }
  };
  </script>
-->
<template>
  <form @submit.prevent="addSpectacle">
    <h6 style="font-weight: bold; text-align: center; color: brown;">Ajout de Spectacle</h6>
    <div class="row">
      <div class="col-md-3">
        <label for="piece" class="form-label">Pièce</label>
        <select class="form-control" v-model="spectacle.idpiece">
          <option value="">Sélectionnez une pièce</option>
          <option v-for="piece in pieces" :key="piece.id" :value="piece.id">{{ piece.titre }}</option>
        </select>
      </div>
      <div class="col-md-3">
        <label for="salle" class="form-label">Salle</label>
        <select class="form-control" v-model="spectacle.idsalle">
          <option value="">Sélectionnez une salle</option>
          <option v-for="salle in salles" :key="salle.id" :value="salle.id">{{ salle.libellé }}</option>
        </select>
      </div>
    </div>
    <br/>
    <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
    <router-link to="/salles" class="btn btn-outline-danger mx-2">
        <i class="fa-solid fa-xmark"></i> Cancel
      </router-link>
  </form>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from 'axios';

const spectacle = ref({
  idpiece: '',
  idsalle: '',
});
const pieces = ref([]);
const salles = ref([]);

const fetchPieces = () => {
  axios.get('http://localhost:8000/api/piece')
    .then(response => {
      pieces.value = response.data.data;
    })
    .catch(error => {
      console.error("Erreur lors de la récupération des pièces :", error);
    });
};

const fetchSalles = () => {
  axios.get('http://localhost:8000/api/salles')
    .then(response => {
      salles.value = response.data.data.map(salle => ({ id: salle.id, libellé: salle.libellé }));
    })
    .catch(error => {
      console.error("Erreur lors de la récupération des salles :", error);
    });
};

const addSpectacle = async () => {
  try {
    await axios.post("http://localhost:8000/api/spectacle", spectacle.value);
    alert("Spectacle ajouté avec succès !");
  } catch (error) {
    console.error("Erreur lors de l'ajout du spectacle :", error);
    alert("Une erreur s'est produite lors de l'ajout du spectacle.");
  }
};

onMounted(() => {
  fetchPieces();
  fetchSalles();
});
</script>

<style scoped>
</style>