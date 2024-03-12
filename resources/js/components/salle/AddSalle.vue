<template>
    <div>
      <h2>Add Salle</h2>
  
      <form @submit.prevent="addSpectacle">
        <label for="name">Spectacle Name:</label>
        <input type="text" v-model="spectacle.name" required>
  
        <!-- Add other form fields as needed -->
  
        <button type="submit">Add Spectacle</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import axios from 'axios';
  import { useRouter } from 'vue-router';
  
  const spectacle = ref({
    name: '',
  });
  
  const router = useRouter();
  
  const addSpectacle = async () => {
    try {
      const response = await axios.post('http://localhost:8000/api/salle', spectacle.value);
      
      if (response.status === 201) {
        // Successful creation, redirect to the page displaying spectacles or perform other actions.
        router.push({ name: 'Spectacles' }); // Adjust the route name as needed
      } else {
        console.error('Failed to add spectacle. Server returned:', response.status);
      }
    } catch (error) {
      console.error('Error adding spectacle:', error);
    }
  };
  </script>