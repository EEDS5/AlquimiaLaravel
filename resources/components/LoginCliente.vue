<template>
    <div class="container mt-5">
        <form @submit.prevent="submitForm">
            <!-- Mensaje de éxito -->
            <div v-if="successMessage" class="alert alert-success">
                {{ successMessage }}
            </div>

            <!-- Mensajes de error -->
            <div v-if="errorMessage" class="alert alert-danger">
                {{ errorMessage }}
            </div>

            <!-- Username -->
            <div class="form-group">
                <input type="text" v-model="form.username" placeholder="Username" class="form-control" :class="{ 'is-invalid': errors.username }">
                <div v-if="errors.username" class="invalid-feedback">
                    {{ errors.username[0] }}
                </div>
            </div>

            <!-- Password -->
            <div class="form-group">
                <input type="password" v-model="form.contraseña" placeholder="Password" class="form-control" :class="{ 'is-invalid': errors.password }">
                <div v-if="errors.contraseña" class="invalid-feedback">
                    {{ errors.contraseña[0] }}
                </div>
            </div>

            <!-- Botón -->
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
import { eventBus } from '../utils/eventBus';

export default {
    data() {
        return {
            form: {
                username: '',
                contraseña: '',
            },
            errors: {},
            successMessage: '',
            errorMessage: '',
        };
    },
    methods: {
        submitForm() {
        // Reiniciar mensajes
        this.successMessage = '';
        this.errorMessage = '';
        this.errors = {};  // Agrega esta línea para reiniciar los errores de validación

        axios.post('/api/login', this.form)
            .then(response => {

                console.log("Response Data:", response.data);
                console.log(response);
                localStorage.setItem('isLoggedIn', 'true');
                localStorage.setItem('userName', this.form.username);
                if (response.data.persona) {
                        // Si 'persona' existe en la respuesta, guarda sus datos
                        localStorage.setItem('userData', JSON.stringify(response.data.persona));
                    } else {
                        // Si 'persona' no existe, manejar de forma adecuada
                        console.log('Datos de persona no están disponibles');
                        // Opcionalmente, podrías establecer un valor predeterminado o vacío
                        localStorage.setItem('userData', JSON.stringify({}));
                    }

                console.log("isLoggedIn:", localStorage.getItem('isLoggedIn'));
                console.log("userName:", localStorage.getItem('userName'));

                this.successMessage = 'Inicio de sesión exitoso. Redirigiendo...';
                // Redirige a la ruta proporcionada o la raíz por defecto
                this.$router.push('/dashboard');

                eventBus.emit('userLoggedIn', this.form.username);

                // Guardar los datos del usuario en el local storage
                localStorage.setItem('userData', JSON.stringify({
                        nombre: response.data.user.nombre,
                        apellido_p: response.data.user.apellido_p,
                        apellido_m: response.data.user.apellido_m,
                        ci: response.data.user.ci,
                        email: response.data.user.email,
                        telefono: response.data.user.telefono
                    }));
            })
            .catch(error => {
                console.error('Error en el inicio de sesión', error);
                if (error.response && error.response.status === 422) {
                    // Maneja errores de validación
                    this.errors = error.response.data.errors;
                    this.errorMessage = 'Credenciales no válidas';
                } else if (error.response && error.response.status === 401) {
                    // Maneja errores de autenticación
                    this.errorMessage = error.response.data.message || 'Error en el inicio de sesión';
                } else {
                    // Maneja otros tipos de errores
                    this.errorMessage = 'Error en el inicio de sesión';
                }
            });
    }
    }
}
</script>

<style scoped>

.container {
    max-width: 400px;
    margin: auto;
    padding: 20px;
    background-color: #f7f7f7;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 50px;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-control {
    border-radius: 5px;
    border: 1px solid #ced4da;
    padding: 10px;
    font-size: 16px;
    transition: border-color 0.3s;
  }

  .form-control:focus {
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
  }

  .is-invalid {
    border-color: #dc3545;
  }

  .invalid-feedback {
    display: block;
    color: #dc3545;
  }

  .btn-primary {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    background-color: #007bff;
    border: none;
    color: white;
    transition: background-color 0.3s;
  }

  .btn-primary:hover {
    background-color: #0056b3;
  }

  .alert {
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 20px;
  }
.is-invalid {
    border-color: #dc3545;
}
.invalid-feedback {
    display: block;
}
</style>

