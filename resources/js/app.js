import './bootstrap';
import { createApp } from 'vue'
import  MenuBarra  from '../components/MenuBarra.vue'
import  RegistroCliente from '../components/RegistroCliente.vue'
import LoginCliente from '../components/LoginCliente.vue';
import Dashboard from '../components/Dashboard.vue';
import router from './router';
import axios from 'axios';
import 'bootstrap/dist/css/bootstrap.min.css';
// import ValidationMessage from '../components/ValidationMessage.vue';
import VideoAlquimia from '../components/VideoAlquimia.vue';
import RegistroGestionMenu from '../components/RegistroGestionMenu.vue';

document.addEventListener('DOMContentLoaded', function () {
    let token = document.head.querySelector('meta[name="csrf-token"]');
    
    if (token) {
      axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    } else {
      console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
    }
  });

const app = createApp({});
app.component('menu-barra', MenuBarra);
app.component('registro-cliente', RegistroCliente);
app.component('login-cliente', LoginCliente);
app.component('dashboard-cliente', Dashboard);
// app.component('validation-message', ValidationMessage);
app.component('video-alquimia', VideoAlquimia);
app.component('registro-gestion-menu', RegistroGestionMenu);
app.use(router);

app.mount('#app');


