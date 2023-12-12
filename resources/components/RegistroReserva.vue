<template>
  <div>
    <form @submit.prevent="submitForm">
      <!-- Campos de Datos de la Persona -->
      <input type="text" v-model="form.nombre" placeholder="Nombre" required>
      <input type="text" v-model="form.apellido_p" placeholder="Apellido Paterno" required>
      <input type="text" v-model="form.apellido_m" placeholder="Apellido Materno" required>
      <input type="text" v-model="form.ci" placeholder="CI" required>
      <input type="email" v-model="form.email" placeholder="Email" required>
      <input type="tel" v-model="form.telefono" placeholder="Teléfono" required>

      <!-- Selección de GestionMenu Activo -->
      <select v-model="form.gestion_menu_id" required>
        <option disabled value="">Seleccione un Gestión Menú</option>
        <option v-for="menu in menusActivos" :key="menu.id" :value="menu.id">
          {{ menu.descripcion }}
        </option>
      </select>

      <!-- Campo para Fecha de Reserva (Fecha futura) -->
      <input type="date" v-model="form.fecha" :min="minDate" required>

      <!-- Campo para Cantidad de Cupo (No negativos) -->
      <input type="number" v-model="form.cantidad_cupo" placeholder="Cantidad de Cupo" min="1" required>

      <!-- Botón para enviar el formulario -->
      <button type="submit">Registrar Reserva</button>
    </form>
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

    confirmarSeleccionMenu() {
      console.log("Menú seleccionado:", this.form.gestion_menu_id);
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
