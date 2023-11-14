import './bootstrap';
import { createApp } from 'vue'
import  MenuBarra  from '../components/MenuBarra.vue'


const app = createApp({});
app.component('menu-barra', MenuBarra);

app.mount('#app');


