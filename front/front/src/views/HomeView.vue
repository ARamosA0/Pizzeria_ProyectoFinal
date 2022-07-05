<template>
  <v-app>
    <Navar/>
    <v-main >
      <v-container>
        <v-list-item-title
            class="text-h3 mb-1 font-weight-black  "
        >
          DELICIOUS PIZZA
          <v-list-item-subtitle class="text-h5 mb-1 font-weight-bold" >
            Estamos disponibles las 24h
            <v-icon
                large
                color="black"
            >
              mdi-car-clock
            </v-icon>

          </v-list-item-subtitle>
          <v-btn class="" to="/busqueda" color="#D32F2F">
            Ordenar ahora
          </v-btn>
        </v-list-item-title>
      </v-container>
    </v-main>
    <Footer/>
  </v-app>
</template>

<script>

import Navar from "../components/Navar.vue";
import Footer from "../components/Footer.vue";
export default {

  name: 'Home',

  components: {
    Navar,
    Footer,
  },

}
</script>

