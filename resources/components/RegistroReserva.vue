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
        cantidad_cupo: 1, // Valor inicial positivo
      },
      minDate: new Date().toISOString().split('T')[0], // Fecha actual como mínimo
      menusActivos: [], // Lista de Menus Activos
      errors: {}
    };
  },
  mounted() {
    this.cargarMenusActivos();
  },
  methods: {
    cargarMenusActivos() {
      // Lógica para cargar los menus activos desde el backend
      axios.get('/api/menus-activos')
      .then(response => {
        this.menusActivos = response.data;
      })

      .then(response => {
  console.log("Datos recibidos:", response.data);
  this.menusActivos = response.data;
})

      .catch(error => {
        console.error('Error al cargar los menús activos:', error);
      });
    },
    submitForm() {
      const datosReserva = {
        // Aquí se mapean los datos del formulario a los datos esperados por la API
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
        cantidad_cupo: this.form.cantidad_cupo,
        // Puedes definir valores predeterminados para 'estado' y 'monto' aquí si es necesario
      }
      };

      axios.post('/api/reservas', datosReserva)
        .then(response => {
          // Manejar el éxito
          alert('Reserva registrada exitosamente.');
          // Reiniciar el formulario
          this.form = {};
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
