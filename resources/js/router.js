import { createRouter, createWebHistory } from 'vue-router';
import Inicio from './views/Inicio.vue';
import Registrarse from './views/Registrarse.vue';
import RegistroMenu from './views/RegistroMenu.vue';  
import LoginCliente from './views/Login.vue';
import Dashboard from './views/Dashboard.vue';

const routes = [
  { path: '/', component: Inicio },
  { path: '/registrarse', component: Registrarse },
  {path: '/registroMenu', component: RegistroMenu },
  { path: '/login', component: LoginCliente },
  { path: '/dashboard', component: Dashboard },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;