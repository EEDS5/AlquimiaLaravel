import { createRouter, createWebHistory } from 'vue-router';
import Inicio from './views/Inicio.vue';
import Registrarse from './views/Registrarse.vue';
import RegistroMenu from './views/RegistroMenu.vue';  

const routes = [
  { path: '/', component: Inicio },
  { path: '/registrarse', component: Registrarse },
  {path: '/registroMenu', component: RegistroMenu },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;