
<template>
  <div class="col-md-6 offset-md-3 border rounded p-4 mt-2 shadow">
    <h4 align="center">Modifier Salle</h4>
    <form @submit.prevent="modifiersalle">
      <div class="row">
        <div class="col-md-6">
          <label for="libellé" class="form-label">Libellé</label>
          <input type="text" class="form-control" id="libellé" v-model="salles.libellé">
        </div>
        <div class="col-md-6 ms-auto">
          <label for="adresse" class="form-label">Adresse</label>
          <input type="text" class="form-control" id="adresse" v-model="salles.adresse">
        </div>
      </div>
      <file-pond
        name="test"
        ref="pond"
        class-name="my-pond"
        label-idle="Drop files here..."
        allow-multiple="false"
        accepted-file-types="image/jpeg, image/png"
        v-bind:files="myFiles"
        v-on:init="handleFilePondInit"
        :server="serverOptions()"
      />
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
import { ref, onMounted, defineProps } from "vue";
import { useRouter, useRoute } from 'vue-router';
import axios from 'axios';

const props = defineProps();
const myFiles = ref([]);
const router = useRouter();
const route = useRoute();

const salles = ref({ libellé: "", adresse: "", imageart: "" }); // Initialisez avec des valeurs vides ou utilisez les propriétés reçues

const handleFilePondInit = async () => {
  if (salles.value.imageart) {
    myFiles.value = [{
      source: salles.value.imageart,
      options: { type: 'local' }
    }];
  }
};

const modifiersalle = () => {
  axios.put(`http://localhost:8000/api/salles/${route.params.id}`, salles.value)
    .then(() => {
      router.push('/salles');
    })
    .catch(error => {
      console.error("There was an error!", error);
    });
};

const serverOptions = () => {
  console.log('server pond');
  return {
    load: (source, load, error, progress, abort, headers) => {
      var myRequest = new Request(source);
      fetch(myRequest).then(function(response) {
        response.blob().then(function(myBlob) {
          load(myBlob);
        });
      });
    },
    process: (fieldName, file, metadata, load, error, progress, abort) => {
      const data = new FormData();
      data.append('file', file);
      data.append('upload_preset', 'GLID5IIT');
      data.append('cloud_name', 'esps');
      data.append('public_id', file.name);
      axios.post('https://api.cloudinary.com/v1_1/esps/upload',data)
        .then((response) => response.data)
        .then((data) => {
          console.log(data);
          salles.value.imageart = data.url; // Correction ici
          load(data);
        })
        .catch((error) => {
          console.error('Error uploading file:', error);
          error('Upload failed');
          abort();
        });
    },
  };
};
</script>

<style scoped>
</style>