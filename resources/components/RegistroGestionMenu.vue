<template>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <h2 class="text-center mb-4 form-header">Programar Gestión Menú</h2>
          <form @submit.prevent="submitForm" class="form-styling border p-4 rounded">
            <!-- Semestre -->
            <div class="mb-3">
              <label for="semestre" class="form-label">Semestre:</label>
              <select id="semestre" class="form-select " :class="{ 'is-invalid': errors.semestre_id }"  v-model="form.semestre_id" 
              @change="validateDateRange" required>
                <option disabled value="">Elige una de las opciones</option>
                <!-- Opciones del semestre -->
                <option v-for="semestre in semestres" :key="semestre.id" :value="semestre.id">
                  {{ semestre.nombre }}
                </option>
              </select>
              <div v-if="errors.semestre_id" class="invalid-feedback">
                {{ errors.semestre_id[0] }}
              </div>
            </div>
            
            <!-- Fecha -->
            <div class="mb-3">
              <label for="fecha" class="form-label">Fecha:</label>
              <input type="date" id="fecha" class="form-control" :class="{ 'is-invalid': errors.fecha }" v-model="form.fecha" required>
              <div v-if="errors.fecha" class="invalid-feedback">
                {{ errors.fecha }}
              </div>
            </div>
            
            <!-- Turno -->
            <div class="mb-3">
              <label for="turno" class="form-label">Turno:</label>
              <select id="turno" class="form-select" v-model="form.turno_id" required>
                <option disabled value="">Elige una opción</option>
                <!-- Opciones de turno -->
                <option v-for="turno in turnos" :key="turno.id" :value="turno.id">
                  {{ turno.descripcion }}
                </option>
              </select>
            </div>

            <!-- Tipo Plato -->
            <div class="mb-3">
              <label for="tipoPlato" class="form-label">Tipo Plato:</label>
              <select id="tipoPlato" class="form-select" v-model="form.tipo_plato_id" required>
                <option disabled value="">Elige una de las opciones</option>
                <!-- Opciones de tipo plato -->
                <option v-for="tipoPlato in tipoPlatos" :key="tipoPlato.id" :value="tipoPlato.id">
                  {{ tipoPlato.nombre }}
                </option>
              </select>
            </div>

            <!-- Categoría -->
            <div class="mb-3">
              <label for="categoria" class="form-label">Categoría:</label>
              <select id="categoria" class="form-select" v-model="form.categoria_id" @change="handleCategoriaChange" required>
                <option disabled value="">Elige una de las opciones</option>
                <option value="1">Menú cerrado</option>
                <option value="2">Buffet</option>
              </select>
            </div>

            <!-- Secciones condicionales de platos para Menú cerrado -->
            <template v-if="form.categoria_id == '1'">
              <!-- Sección de Entrantes -->
              <div class="mb-3">
                <label>Entrantes:</label>
                <div v-for="(selectedEntrante, index) in form.entrantes" :key="index">
                  <select v-model="selectedEntrante.id" class="form-select">
                    <option disabled value="">Selecciona un entrante</option>
                    <option v-for="plato in platos" :key="plato.id" :value="plato.id">
                      {{ plato.nombre }}
                    </option>
                  </select>
                  <button @click.prevent="eliminarPlato('entrantes', index)" class="btn btn-danger btn-sm">Eliminar</button>
                </div>
                <button @click.prevent="agregarPlato('entrantes')">Agregar entrante</button>
              </div>

              <!-- Sección de Platos Principales -->
              <div class="mb-3">
                <label>Principal:</label>
                <div v-for="(selectedPrincipal, index) in form.principales" :key="index">
                  <select v-model="selectedPrincipal.id" class="form-select">
                    <option disabled value="">Selecciona un plato principal</option>
                    <option v-for="plato in platos" :key="plato.id" :value="plato.id">
                      {{ plato.nombre }}
                    </option>
                  </select>
                  <button @click.prevent="eliminarPlato('principales', index)" class="btn btn-danger btn-sm">Eliminar</button>
                </div>
                <button @click.prevent="agregarPlato('principales')">Agregar principal</button>
              </div>

              <!-- Sección de Postres -->
              <div class="mb-3">
                <label>Postre:</label>
                <div v-for="(selectedPostre, index) in form.postres" :key="index">
                  <select v-model="selectedPostre.id" class="form-select">
                    <option disabled value="">Selecciona un postre</option>
                    <option v-for="plato in platos" :key="plato.id" :value="plato.id">
                      {{ plato.nombre }}
                    </option>
                  </select>
                  <button @click.prevent="eliminarPlato('postres', index)" class="btn btn-danger btn-sm">Eliminar</button>
                </div>
                <button @click.prevent="agregarPlato('postres')">Agregar postre</button>
              </div>
            </template>

        <!-- Sección condicional para Buffet -->
        <template v-if="form.categoria_id == '2'">
          <div class="mb-3">
            <label>Barra libre:</label>
            <div v-for="(selectBarraLibre, index) in form.BarraLibre" :key="index">
              <select v-model="selectBarraLibre.id" class="form-select">
              <option disabled value="">Selecione un plato</option>
                <option v-for="plato in platos" :key="plato.id" :value="plato.id">
                  {{ plato.nombre }}
                </option>
              </select>
              <button @click.prevent="eliminarPlato('barras', index)" class="btn btn-danger btn-sm">Eliminar</button>
            </div>
              <button @click.prevent="agregarPlato('barras')">Agregar plato</button>
          </div>
        </template>

            <!-- Precio y Cupos -->
            <div class="mb-3">
              <label for="costo" class="form-label">Costo:</label>
              <input type="number" id="costo" class="form-control" v-model="form.costo" required>

              <label for="cupos" class="form-label">Cupos:</label>
              <input type="number" id="cupos" class="form-control" v-model="form.cupos" required>
            </div>

            <!-- Imagen -->
            <div class="mb-3">
              <label for="imagen" class="form-label">Imagen:</label>
              <input type="file" id="imagen" @change="handleFileUpload" class="form-control" required>
            </div>

            <!-- Descripción -->
            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción:</label>
              <textarea id="descripcion" class="form-control" v-model="form.descripcion" required></textarea>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
     </div>
    </div>
  </div>
</template>

<style scoped>
  .form-container {
    max-width: 400px;
    margin: 0 auto;
  }

  /* Estilos adicionales para campos y botones */
  .form-control, .form-select {
    margin-bottom: 15px;
  }

  /* Botón centrado y estilizado */
  .btn-primary {
    width: 100%;
    padding: 10px;
    margin-top: 20px;
  }

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

.form-styling  {
  color: #faf9f9; 
}

.invalid-feedback {
  display: block; 
  width: 100%; 
  overflow: visible; 
  /**display: block*/;
}



/* Si necesitas estilos adicionales, aquí puedes añadirlos */
</style>

  
<script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        
        form: {
          categoria_id: '',
          semestre_id: '',
          tipo_plato_id: '',
          turno_id: '',
          descripcion: '',
          imagen: '',
          costo: '',
          total_cupo: '',
          cupo_disponible: '',
          fecha: '',
          estado: 'A',
          entrantes: [{ id: null }],
          principales: [{ id: null }],
          postres: [{ id: null }],
          BarraLibre: [{ id: null }],
        },
        semestreData: {
          fecha_inicio: null,
          fecha_final: null,
        },
        
        file: null, // Este es para mantener el archivo binario de la imagen
        categorias: [], // Datos dinámicos cargados del backend
        semestres: [],  // Datos dinámicos cargados del backend
        tipoPlatos: [], // Datos dinámicos cargados del backend
        turnos: [],     // Datos dinámicos cargados del backend
        platos: [],     // Datos dinámicos cargados del backend
        errors: {fecha: null,}
      };
    },
    mounted() {
      // Cargar datos de selección desde el backend aquí...
      this.loadCategorias();
      this.loadSemestres();
        this.loadTipoPlatos();
        this.loadTurnos();
        this.loadPlatos();

      
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

    loadPlatos() {
      axios.get('/api/platos').then(response => {
        this.platos = response.data;
      }).catch(error => {
        console.error('Error loading plates:', error);
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
      validateDateRange() {
        // Aquí validas que la fecha esté en el rango permitido por el semestre seleccionado
        const selectedSemestre = this.semestres.find(semestre => semestre.id === this.form.semestre_id);
        if (selectedSemestre) {
          this.semestreData.fecha_inicio = selectedSemestre.fecha_inicio;
          this.semestreData.fecha_final = selectedSemestre.fecha_final;
        }
      },

      agregarPlato(tipo) {
          if (tipo === 'entrantes') {
          this.form.entrantes.push({ id: null });
        } else if (tipo === 'principales') {
          this.form.principales.push({ id: null });
        } else if (tipo === 'postres') {
          this.form.postres.push({ id: null });
        } else if (tipo === 'barras') {
          this.form.BarraLibre.push({ id: null });
        }
        if (ultimoPlato && ultimoPlato.id) {
        // Si ya hay un plato seleccionado, añadir un nuevo campo
        this.form[tipo].push({ id: null });
        } else if (!ultimoPlato || !ultimoPlato.id) {
        // Si el último plato está vacío, mostrar una alerta
        alert('Por favor, selecciona un plato antes de añadir otro.');
        }
      },

      eliminarPlato(tipo, index) {
            
        if (tipo === 'entrantes') {
          this.form.entrantes.splice(index, 1);
        } else if (tipo === 'principales') {
          this.form.principales.splice(index, 1);
        } else if (tipo === 'postres') {
          this.form.postres.splice(index, 1);
        } else if (tipo === 'barras') {
          // Asegúrate de que 'BarraLibre' aquí coincida exactamente con cómo está definido en tu modelo de datos
          this.form.BarraLibre.splice(index, 1);
        }
      },
      printFormData() {
      console.log(this.form);
    },

    submitForm() {
        // Crear un objeto FormData para enviar los datos del formulario
        const formData = new FormData();

        // Agregar el archivo de imagen si está presente
        if (this.file) {
          formData.append('imagen', this.file);
        }

        // Agregar los campos del formulario al objeto FormData
        formData.append('categoria_id', this.form.categoria_id);
        formData.append('semestre_id', this.form.semestre_id);
        formData.append('tipo_plato_id', this.form.tipo_plato_id);
        formData.append('turno_id', this.form.turno_id);
        formData.append('descripcion', this.form.descripcion);
        formData.append('costo', this.form.costo);
        formData.append('total_cupo', this.form.cupos); // Suponiendo que 'total_cupo' es lo mismo que 'cupos'
        formData.append('cupo_disponible', this.form.cupos);
        formData.append('fecha', this.form.fecha);
        formData.append('estado', 'A'); // Suponiendo que 'estado' siempre es 'A' para activo

        // Agregar los IDs de los platos seleccionados como menús ofertados
        this.form.entrantes.concat(this.form.principales, this.form.postres, this.form.BarraLibre).forEach(plato => {
          if (plato.id) {
            formData.append('menus_ofertados[]', plato.id);
          }
        });

        // Imprimir la información que se va a enviar para depuración
        console.log('Data que se enviará:', Object.fromEntries(formData.entries()));

        // Enviar el formulario usando Axios
        axios.post('/api/gestion-menus', formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        })
        .then(response => {
          // Trata la respuesta del servidor aquí
          console.log('Respuesta del servidor:', response);
          // Por ejemplo, redirige o muestra un mensaje de éxito
          alert('Menú guardado con éxito');
          this.$router.push('/'); // Redireccion
        })
          .catch(error => {
          // Manejar errores de validación o de servidor
          if (error.response) {
          if (error.response.status === 422) {
          // Errores de validación
          this.errors = error.response.data.errors;
          alert('Errores de validación. Por favor, verifica los datos del formulario.');
          } else {
          // Otros errores del servidor
          alert('Error al guardar el menú. Por favor, intenta de nuevo.');
          }
          } else {
          console.error('Error:', error);
          alert('Error de conexión o de servidor.');
          }
         });
     }

    },
    watch: {
      'form.fecha'(newDate) {
      if (newDate < this.semestreData.fecha_inicio || newDate > this.semestreData.fecha_final) {
        
        const fechaInicioFormatted = new Date(this.semestreData.fecha_inicio).toLocaleDateString();
        const fechaFinalFormatted = new Date(this.semestreData.fecha_final).toLocaleDateString();
        
        this.errors.fecha = `Elige una fecha entre ${fechaInicioFormatted} y ${fechaFinalFormatted}`;
        console.log(this.errors.fecha);
      } else {
        // Limpiar el error si la fecha está en el rango válido
        this.errors.fecha = '';
      }
   }
  }
};
</script>
  