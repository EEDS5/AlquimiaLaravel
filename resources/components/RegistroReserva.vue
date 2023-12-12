<template>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <h2 class="text-center mb-4 form-header">Registrar Reserva</h2>
        <form @submit.prevent="submitForm" class="form-styling border p-4 rounded">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" v-model="form.nombre" placeholder="Nombre" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="apellido_p" class="form-label">Apellido Paterno:</label>
            <input type="text" id="apellido_p" v-model="form.apellido_p" placeholder="Apellido Paterno" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="apellido_m" class="form-label">Apellido Materno:</label>
            <input type="text" id="apellido_m" v-model="form.apellido_m" placeholder="Apellido Materno" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="ci" class="form-label">CI:</label>
            <input type="text" id="ci" v-model="form.ci" placeholder="CI" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" v-model="form.email" placeholder="Email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono:</label>
            <input type="tel" id="telefono" v-model="form.telefono" placeholder="Teléfono" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="gestion_menu_id" class="form-label">Gestión Menú Activo:</label>
            <select id="gestion_menu_id" v-model="form.gestion_menu_id" class="form-select" required>
              <option disabled value="">Seleccione un Gestión Menú</option>
              <option v-for="menu in menusActivos" :key="menu.id" :value="menu.id">{{ menu.descripcion }}</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="fecha" class="form-label">Fecha de Reserva:</label>
            <input type="date" id="fecha" v-model="form.fecha" :min="minDate" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="cantidad_cupo" class="form-label">Cantidad de Cupo:</label>
            <input type="number" id="cantidad_cupo" v-model="form.cantidad_cupo" placeholder="Cantidad de Cupo" min="1" class="form-control" required>
          </div>

          <!-- Botón para enviar el formulario -->
          <button type="submit" class="btn btn-primary">Registrar Reserva</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        nombre: '',
        apellido_p: '',
        apellido_m: '',
        ci: '',
        email: '',
        telefono: '',
        gestion_menu_id: '',
        fecha: '',
        cantidad_cupo: 1,
      },
      minDate: new Date().toISOString().split('T')[0],
      menusActivos: [],
      errors: {}
    };
  },
  mounted() {
    this.cargarMenusActivos();
    this.loadUserData();
    if (this.userData) {
      this.preRellenarDatosUsuario();
    }
  },
  methods: {
    cargarMenusActivos() {
      axios.get('/api/menus-activos')
        .then(response => {
          this.menusActivos = response.data;
        })
        .catch(error => {
          console.error('Error al cargar los menús activos:', error);
        });
    },

    loadUserData() {
      const userData = localStorage.getItem('userData');
      if (userData) {
        this.userData = JSON.parse(userData);
        this.preRellenarDatosUsuario();
      }
    },
    preRellenarDatosUsuario() {
      this.form.nombre = this.userData.nombre || '';
      this.form.apellido_p = this.userData.apellido_p || '';
      this.form.apellido_m = this.userData.apellido_m || '';
      this.form.ci = this.userData.ci || '';
      this.form.email = this.userData.email || '';
      this.form.telefono = this.userData.telefono || '';
    },

    submitForm() {
      console.log("Formulario a enviar:", this.form); // Depuración
      const datosClienteYReserva = {
        persona: {
          nombre: this.form.nombre,
          apellido_p: this.form.apellido_p,
          apellido_m: this.form.apellido_m,
          ci: this.form.ci,
          email: this.form.email,
          telefono: this.form.telefono
        },
        reserva: {
          gestion_menu_id: this.form.gestion_menu_id,
          fecha: this.form.fecha,
          cantidad_cupo: this.form.cantidad_cupo
        }
      };

      axios.post('/api/reserva', datosClienteYReserva)
        .then(response => {
          alert('Cliente y reserva registrados exitosamente.');
          this.form = {}; // Reiniciar el formulario
        })
        .catch(error => {
          if (error.response && error.response.status === 422) {
            this.errors = error.response.data.errors;
          } else {
            console.error('Error al enviar el formulario:', error);
          }
        });
    }
  }
};
</script>

<style scoped>
/* Copia los estilos de RegistroGestionMenu.vue aquí */
.form-header {
  color: white;
}

.form-styling {
  background-color: #343a40; /* Bootstrap dark background */
  color: white;
}

.form-styling .form-control, .form-styling .form-select {
  margin-bottom: 15px;
}

.form-styling .btn-primary {
  width: 100%;
  padding: 10px;
  margin-top: 20px;
}

.invalid-feedback {
  display: block; 
  width: 100%; 
  overflow: visible;
}
</style>

