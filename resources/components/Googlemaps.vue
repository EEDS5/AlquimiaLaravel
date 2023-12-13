<template>
    <div class="container location-style">
     <h2>Ubicación del restaurante</h2>
     <p>La dirección del restaurante es:</p>
     <address>
          Ave Sexto Anillo, Santa Cruz de la Sierra
     </address>
     <a
         href="https://maps.app.goo.gl/Gpc7UobVoq8QxJBH6"
         target="_blank"
         class="btn btn-secundary"
     >
         <img
             src="../imagenes/googleRestaurante.png"
             alt="Restaurante"
         />
         Ver en Google Maps
     </a>
 </div>
 
 </template>
 
 <style>
     .location-style {
      text-align: center;
      margin-bottom: 30px;
     }
 
     .location-style h2 {
      color: white;
     }
 
     .location-style p {
      color: white;
     }
 
     .location-style address {
      color: white;
     }
 
     .location-style a {
      color: white;
     }
 
     .location-style .btn {
      background-color: #000000;
      color: white;
      border-radius: 10px;
     }
 
     .location-style .btn:hover {
      box-shadow: 0 0 10px 5px #ffffff;
     }
 
     .location-style img {
      display: block;
      margin: 0 auto;
     } 
     
     .location-style {
         margin-bottom: 30px;
     }

     @media (max-width: 600px) {
        .location-style h2 {
            font-size: 1.5rem; /* Tamaño de fuente más pequeño */
        }

        .location-style .btn {
            padding: 10px 20px; /* Ajustar el relleno */
            font-size: 0.9rem; /* Tamaño de fuente más pequeño */
        }

        .location-style img {
            width: 80%; /* Hacer la imagen más pequeña y responsiva */
            height: auto; /* Mantener la relación de aspecto */
        }
    }

    @media (max-width: 800px) {
        .location-style h2 {
            font-size: 1.5rem; /* Tamaño de fuente más pequeño */
        }

        .location-style .btn {
            padding: 10px 20px; /* Ajustar el relleno */
            font-size: 0.9rem; /* Tamaño de fuente más pequeño */
        }

        .location-style img {
            width: 80%; /* Hacer la imagen más pequeña y responsiva */
            height: auto; /* Mantener la relación de aspecto */
        }
    }

    @media (max-width: 1000px) {
        .location-style h2 {
            font-size: 1.5rem; /* Tamaño de fuente más pequeño */
        }

        .location-style .btn {
            padding: 10px 20px; /* Ajustar el relleno */
            font-size: 0.9rem; /* Tamaño de fuente más pequeño */
        }

        .location-style img {
            width: 80%; /* Hacer la imagen más pequeña y responsiva */
            height: auto; /* Mantener la relación de aspecto */
        }
    }
    
 </style>
 
 <script>
     export default {
     name: "Googlemaps",
     };
 </script>