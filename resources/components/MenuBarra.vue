<template>
  <nav class="navbar navbar-expand-md sticky-top py-3 navbar-dark" id="mainNav" style="background: var(--bs-emphasis-color);">
         <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><a class="navbar-brand" href="#">
         <img src="../imagenes/LogoAlquimia.svg" alt="" width="250" height="50" class="d-inline-block align-text-top img-fluid" to="/">
       </a></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
             <div class="collapse navbar-collapse" id="navcol-1">
                 <ul class="navbar-nav mx-auto mr-auto">
                    <li class="nav-item">
                      <router-link class="nav-link" to="/">Inicio</router-link>
                    </li>
                     <li class="nav-item"><a class="nav-link " href="">Acerca de <br>nosotros</a></li>
                     <li class="nav-item"><a class="nav-link" href="">Licenciatura en<br>gastronomia</a></li>
                     <li class="nav-item"><a class="nav-link" href="">Docentes</a></li>
                     <li class="nav-item"><a class="nav-link" href="">Galeria</a></li>
                     <li class="nav-item">
                      <router-link class="nav-link" to="/reserva">Reserva</router-link>
                      </li>                   
                    </ul>
                 <router-link to="/registroMenu" class="btn btn-secondary" role="button" style="background-color: #ffffff; color: #000000; border-radius: 10px;">Creación <br> Menú</router-link>
                 <div v-if="isLoggedIn">
                      <span style="color: white;">Bienvenido, {{ userName }}</span>
                      <button @click="logout" class="btn btn-secondary">Cerrar Sesión</button>
                </div>
                <div v-else>
                  <router-link to="/registrarse" class="btn btn-secondary" role="button" style="background-color: #ffffff; color: #000000; border-radius: 10px;">Registrarse</router-link>
                  <router-link to="/login" class="btn btn-secondary" role="button" style="background-color: #ffffff; color: #000000; border-radius: 10px;">Iniciar sesión</router-link>
                </div>

            

             </div>
         </div>
     </nav>
   </template>
 <style scoped>
 #mainNav .btn {
   margin-left: 10px;
   background-color: #ffffff;
   color: #000000;
   border-radius: 10px;
 }
 
 #mainNav .btn:hover {
   box-shadow: 0 0 10px 5px #ffffff;
 }
 
 .nav-item a {
   display: flex; /* Coloca los enlaces en una disposición flexible */
   align-items: center; /* Alinea los enlaces verticalmente en el centro */
   text-align: center; /* Alinea los enlaces horizontalmente en el centro */
 } 
  
 
 </style>
 
 <script>
 import { eventBus } from '../utils/eventBus';
     export default {
         name: 'BarraMenu',
         data() {
              return {
                  isLoggedIn: false,
                  userName: ''
              };
          },
          watch: {
        '$route': function() {
            this.isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';
            this.userName = localStorage.getItem('userName');
        }
    },
           methods: {
              goToRegister() {
                window.location.href = '/register';
              },

              goToLogin() {
                window.location.href = '/login';
              },
              
              goToLogin() {
                window.location.href = '/';
              },

              logout() {
              // Limpiar localStorage
              localStorage.removeItem('isLoggedIn');
              localStorage.removeItem('userName');
              localStorage.removeItem('userData'); // Limpia los datos del usuario
              // Actualizar cualquier estado relevante o redirigir
              this.isLoggedIn = false;
              this.userName = '';
               // Por ejemplo, si usas una propiedad reactiva para el estado de inicio de sesión:
              this.$router.push('/'); // Redirigir al usuario a la página de inicio de sesión
              }

            },

            mounted() {
     this.isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';
     this.userName = localStorage.getItem('userName');

     eventBus.on('userLoggedIn', (username) => {
       this.isLoggedIn = true;
       this.userName = username;
     });
   },
   beforeDestroy() {
     // Limpiar el listener del evento para evitar fugas de memoria
     this.$root.$off('userLoggedIn');
   }
}
 </script>