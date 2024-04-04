<template>
    <div class="menu">
      <router-link to="/listart" class="btn btn-primary">New Salle</router-link>
      <router-link to="/addSpectacle" class="btn btn-primary">Ajouter Spectacle</router-link>
    </div>
  </template>
  
  <script>
  export default {
    name: 'Menu',
  };
  </script>
  
  <style scoped>
  .menu {
    margin-bottom: 20px;
  }
  </style>