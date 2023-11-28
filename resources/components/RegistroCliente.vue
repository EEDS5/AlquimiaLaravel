<template>
    <div class="container mt-5">
        <form @submit.prevent="submitForm">
         <!-- CI -->
      <div class="form-group">
        <input type="text" v-model="form.ci" placeholder="C.I." class="form-control" :class="{ 'is-invalid': errors.ci }">
        <!-- Asumiendo que quieres mostrar el mensaje de error debajo de cada campo -->
        <div v-if="errors.ci" class="invalid-feedback">
          {{ errors.ci[0] }}
        </div>
      </div>
        <!-- Nombre -->
        <div class="form-group">
            <input type="text" v-model="form.nombre" placeholder="Nombre" class="form-control" :class="{ 'is-invalid': errors.nombre }">
            <!-- Asumiendo que quieres mostrar el mensaje de error debajo de cada campo -->
            <div v-if="errors.nombre" class="invalid-feedback">
                {{ errors.nombre[0] }}
            </div>
        </div>
        <!-- Apellido Paterno -->
        <div class="form-group">
            <input type="text" v-model="form.apellido_p" placeholder="Apellido Paterno" class="form-control" :class="{ 'is-invalid': errors.apellido_p }">
            <!-- Asumiendo que quieres mostrar el mensaje de error debajo de cada campo -->
            <div v-if="errors.apellido_p" class="invalid-feedback">
                {{ errors.apellido_p[0] }}
            </div>
        </div>
        <!-- Apellido Materno -->
        <div class="form-group">
            <input type="text" v-model="form.apellido_m" placeholder="Apellido Materno" class="form-control" :class="{ 'is-invalid': errors.apellido_m }">
            <!-- Asumiendo que quieres mostrar el mensaje de error debajo de cada campo -->
            <div v-if="errors.apellido_m" class="invalid-feedback">
                {{ errors.apellido_m[0] }}
            </div>
        </div>
        <!-- Telefono -->
        <div class="form-group">
            <input type="text" v-model="form.telefono" placeholder="Telefono" class="form-control" :class="{ 'is-invalid': errors.telefono }">
            <!-- Asumiendo que quieres mostrar el mensaje de error debajo de cada campo -->
            <div v-if="errors.telefono" class="invalid-feedback">
                {{ errors.telefono[0] }}
            </div>
        </div>
        <!-- Direccion -->
        <div class="form-group">
            <input type="text" v-model="form.direccion" placeholder="Direccion" class="form-control" :class="{ 'is-invalid': errors.direccion }">
            <!-- Asumiendo que quieres mostrar el mensaje de error debajo de cada campo -->
            <div v-if="errors.direccion" class="invalid-feedback">
                {{ errors.direccion[0] }}
            </div>
        </div>
        <!-- Email -->
        <div class="form-group">
            <input type="text" v-model="form.email" placeholder="Email" class="form-control" :class="{ 'is-invalid': errors.email }">
            <!-- Asumiendo que quieres mostrar el mensaje de error debajo de cada campo -->
            <div v-if="errors.email" class="invalid-feedback">
                {{ errors.email[0] }}
            </div>
        </div>
        <!-- Username -->

        <div class="form-group">
            <input type="text" v-model="form.username" placeholder="Username" class="form-control" :class="{ 'is-invalid': errors.username }">
            <!-- Asumiendo que quieres mostrar el mensaje de error debajo de cada campo -->
            <div v-if="errors.username" class="invalid-feedback">
                {{ errors.username[0] }}
            </div>
        </div>
        <!-- Password -->
        <div class="form-group">
            <input type="password" v-model="form.password" placeholder="Password" class="form-control" :class="{ 'is-invalid': errors.password }">
            <!-- Asumiendo que quieres mostrar el mensaje de error debajo de cada campo -->
            <div v-if="errors.password" class="invalid-feedback">
                {{ errors.password[0] }}
            </div>
        </div>
        <!-- Password Confirmation -->

        <div class="form-group">
            <input type="password" v-model="form.password_confirmation" placeholder="Password Confirmation" class="form-control" :class="{ 'is-invalid': errors.password_confirmation }">
            <!-- Asumiendo que quieres mostrar el mensaje de error debajo de cada campo -->
            <div v-if="errors.password_confirmation" class="invalid-feedback">
                {{ errors.password_confirmation[0] }}
            </div>
        </div>
        <!-- Razon Social -->
        <div class="form-group">
            <input type="text" v-model="form.razon_social" placeholder="Razon Social" class="form-control" :class="{ 'is-invalid': errors.razon_social }">
            <div v-if="errors.razon_social" class="invalid-feedback">
                {{ errors.razon_social[0] }}
            </div>
        </div>
        <!-- Nit -->
        <div class="form-group">
            <input type="text" v-model="form.nit" placeholder="Nit" class="form-control" :class="{ 'is-invalid': errors.nit }">
            
            <div v-if="errors.nit" class="invalid-feedback">
                {{ errors.nit[0] }}
            </div>
        </div>
        <!-- ---Boton--- -->
        <button type="submit" class="btn btn-primary">Registrarse</button>
      </form>
      
    </div>
  </template>
  
  <script>

  import axios from 'axios';
  import ValidationMessages from '../components/ValidationMessages.vue';
  
  export default {
    components: {
      ValidationMessages
    },
    data() {
      return {
        form: {
          ci: '',
          nombre: '',
          apellido_p: '',
          apellido_m: '',
          telefono: '',
          direccion: '',
          email: '',
          username: '',
          password: '',
          password_confirmation: '',
          razon_social: '',
          nit: ''
        },
        errors: {},
      };
    },
    methods: {
      submitForm() {
            axios.post('/api/register', this.form)
            .then(response => {
                // Trata la respuesta del servidor aquí
                console.log(response);
                // Resetear la bandera de intento de envío
                this.submitAttempt = false;
                // Por ejemplo, redirige o muestra un mensaje de éxito
                this.$router.push('/');
            })
            .catch(error => {
                // Maneja errores aquí, como errores de validación
                console.log(error);
                if (error.response && error.response.status === 422) {
                // Asume que el servidor devuelve errores de validación en "error.response.data.errors"
                // Puedes usar estos errores para mostrar mensajes al usuario
                this.errors = error.response.data.errors;
                } else {
                 // ... manejar otro s tipos de errores ...
                }
            });
      }
    }
  }
  </script>
  <style scoped>
  .is-invalid {
    border-color: #dc3545;
  }
  .invalid-feedback {
    display: block; /* Cambiado de none a block para que se muestre */
  }
  </style>
  