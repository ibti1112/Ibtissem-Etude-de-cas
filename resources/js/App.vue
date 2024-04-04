<!----<template>
    <router-view> </router-view>
    </template>
-->

<template>
    <div id="app">
      <Menu />
      <router-view />
    </div>
  </template>
  
  <script>
  import Menu from './components/Menu.vue';
  
  export default {
    components: {
      Menu,
    },
  };
  </script>
  
  <style>
  #app {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px; /* Ajoutez un espace pour le menu */
  }
  </style>