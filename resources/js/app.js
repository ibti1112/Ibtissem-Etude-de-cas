import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from "vue-router";
import { routes } from "./routes";
import 'bootstrap/dist/css/bootstrap.min.css'
import App from './App.vue'
import "@fortawesome/fontawesome-free/css/all.css";
//import PrimeVue from 'primevue/config';
//import 'primevue/resources/themes/lara-light-green/theme.css';
//import store from './store';

let app = createApp(App);

const router = createRouter({
history: createWebHistory(),
routes: routes,
});//const app = createApp(App);


app.use(router);
//app.use(PrimeVue);
//app.use(router);
app.mount("#app");
//app.use(store);