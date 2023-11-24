<template>
    <div>
      <form @submit.prevent="submitForm">
        <!-- Select para Categoría -->
        <select v-model="form.categoria_id" required>
          <option disabled value="">Seleccione una categoría</option>
          <option v-for="categoria in categorias" :key="categoria.id" :value="categoria.id">
            {{ categoria.descripcion }}
          </option>
        </select>
        <!-- Mensaje de validación para Categoría -->
        <div v-if="errors.categoria_id">{{ errors.categoria_id }}</div>
        
        <!-- Select para Semestre -->
        <select v-model="form.semestre_id" required>
          <option disabled value="">Seleccione un semestre</option>
          <option v-for="semestre in semestres" :key="semestre.id" :value="semestre.id">
            {{ semestre.descripcion }}
          </option>
        </select>
        <!-- Mensaje de validación para Semestre -->
        <div v-if="errors.semestre_id">{{ errors.semestre_id }}</div>

        <!-- Select para Tipo Plato -->
        <select v-model="form.tipo_plato_id" required>
          <option disabled value="">Seleccione un tipo de plato</option>
          <option v-for="tipoPlato in tipoPlatos" :key="tipoPlato.id" :value="tipoPlato.id">
            {{ tipoPlato.descripcion }}
          </option>
        </select>
        <!-- Mensaje de validación para Tipo Plato -->
        <div v-if="errors.tipo_plato_id">{{ errors.tipo_plato_id }}</div>

        <!-- Select para Turno -->
        <select v-model="form.turno_id" required>
          <option disabled value="">Seleccione un turno</option>
          <option v-for="turno in turnos" :key="turno.id" :value="turno.id">
            {{ turno.descripcion }}
          </option>
        </select>
        <!-- Mensaje de validación para Turno -->
        <div v-if="errors.turno_id">{{ errors.turno_id }}</div>

        <!-- Select para Menú Ofertado -->
        <select v-model="form.menu_ofertado_id" required>
          <option disabled value="">Seleccione un menú ofertado</option>
          <option v-for="menuOfertado in menusOfertados" :key="menuOfertado.id" :value="menuOfertado.id">
            {{ menuOfertado.descripcion }}
          </option>
        </select>
        <!-- Mensaje de validación para Menú Ofertado -->
        <div v-if="errors.menu_ofertado_id">{{ errors.menu_ofertado_id }}</div>

        <!-- Select para bebida -->
        <select v-model="form.bebida_id" required>
          <option disabled value="">Seleccione una bebida</option>
          <option v-for="bebida in bebidas" :key="bebida.id" :value="bebida.id">
            {{ bebida.descripcion }}
          </option>
        </select>
        <!-- Mensaje de validación para bebida -->
        <div v-if="errors.bebida_id">{{ errors.bebida_id }}</div>


       
        <!-- Campo para descripción -->
        <input type="text" v-model="form.descripcion" placeholder="Descripción" required>
        <!-- Mensaje de validación para Descripción -->
        <div v-if="errors.descripcion">{{ errors.descripcion }}</div>

      <!-- Campo para la Imagen -->
      <input type="file"  @change="handleFileUpload" required>
      <!-- Mensaje de validación para Imagen -->
      <div v-if="errors.imagen">{{ errors.imagen[0] }}</div>

      <!-- Campo para Costo -->
      <input type="number" v-model="form.costo" placeholder="Costo" min="0" step="0.01" required>
      <!-- Mensaje de validación para Costo -->
      <div v-if="errors.costo">{{ errors.costo[0] }}</div>

      <!-- Campo para Total Cupo -->
      <input type="number" v-model="form.total_cupo" placeholder="Total de cupos" min="0" required>
      <!-- Mensaje de validación para Total Cupo -->
      <div v-if="errors.total_cupo">{{ errors.total_cupo[0] }}</div>

      <!-- Campo para Cupo Disponible -->
      <input type="number" v-model="form.cupo_disponible" placeholder="Cupos disponibles" min="0" required>
      <!-- Mensaje de validación para Cupo Disponible -->
      <div v-if="errors.cupo_disponible">{{ errors.cupo_disponible[0] }}</div>

      <!-- Campo para Fecha -->
      <input type="datetime-local" v-model="form.fecha" placeholder="Fecha y hora" required>
      <!-- Mensaje de validación para Fecha -->
      <div v-if="errors.fecha">{{ errors.fecha[0] }}</div>

      <!-- Select para Estado -->
      <select v-model="form.estado" required>
        <option disabled value="">Seleccione el estado</option>
        <option value="A">Activo</option>
        <option value="I">Inactivo</option>
      </select>
      <!-- Mensaje de validación para Estado -->
      <div v-if="errors.estado">{{ errors.estado[0] }}</div>
  
        <button type="submit">Crear Menú</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        form: {
          // Inicializa todas las propiedades del modelo aquí...
          categoria_id: '',
          semestre_id: '',
          tipo_plato_id: '',
          turno_id: '',
          menu_ofertado_id: '',
          descripcion: '',
          imagen: '',
            costo: '',
            total_cupo: '',
            cupo_disponible: '',
            fecha: '',
            estado: 'A',
        },
        file: null, // Este es para mantener el archivo binario de la imagen
        categorias: [], // Datos dinámicos cargados del backend
        semestres: [],  // Datos dinámicos cargados del backend
        tipoPlatos: [], // Datos dinámicos cargados del backend
        turnos: [],     // Datos dinámicos cargados del backend
        menusOfertados: [], // Datos dinámicos cargados del backend
        errors: {}
      };
    },
    mounted() {
      // Cargar datos de selección desde el backend aquí...
      this.loadCategorias();
      this.loadSemestres();
        this.loadTipoPlatos();
        this.loadTurnos();
        this.loadMenusOfertados();
      
    },
    methods: {
        handleFileUpload(event) {
      this.file = event.target.files[0];
      this.form.imagen = event.target.files[0].name;
    },
        loadCategorias() {
      axios.get('/api/categorias').then(response => {
        this.categorias = response.data;
      }).catch(error => {
        console.error('Error loading categories:', error);
      });
    },
    loadSemestres() {
      axios.get('/api/semestres').then(response => {
        this.semestres = response.data;
      }).catch(error => {
        console.error('Error loading semesters:', error);
      });
    },
    loadTipoPlatos() {
      axios.get('/api/tipo-platos').then(response => {
        this.tipoPlatos = response.data;
      }).catch(error => {
        console.error('Error loading plate types:', error);
      });
    },
    loadTurnos() {
      axios.get('/api/turnos').then(response => {
        this.turnos = response.data;
      }).catch(error => {
        console.error('Error loading shifts:', error);
      });
    },
    loadMenusOfertados() {
      axios.get('/api/menu-ofertados').then(response => {
        this.menusOfertados = response.data;
      }).catch(error => {
        console.error('Error loading offered menus:', error);
      });
    },
    submitForm() {
        let formData = new FormData();

      // Agrega el archivo al objeto formData si existe un archivo
      if (this.file) {
        formData.append('imagen', this.file, this.file.name);
      }

      // Agrega otros campos del formulario al objeto formData
      for (let key in this.form) {
        if (key !== 'imagen') { // No agregar el campo imagen que es solo el nombre del archivo
          formData.append(key, this.form[key]);
        }
      }
      axios.post('/api/gestion-menus', this.form).then(response => {
        // Handle your success
        alert('Menu gestionado exitosamente.');
        // Reset the form
        this.form = {};
      }).catch(error => {
        if (error.response && error.response.status === 422) {
          // Handle validation errors
          this.errors = error.response.data.errors;
        } else {
          // Handle other kinds of errors
          console.error('Error submitting form:', error);
        }
      });
    }
    }
  };
  </script>
  