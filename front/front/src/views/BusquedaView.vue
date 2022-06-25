<template>
<div>
  <v-stepper v-model="e1">
    <v-stepper-header>
      <v-stepper-step
        :complete="e1 > 1"
        step="1"
      >
        Escoge ingredientes
      </v-stepper-step>

      <v-divider></v-divider>

      <v-stepper-step
        :complete="e1 > 2"
        step="2"
      >
        Escoge el tamano y Rating
      </v-stepper-step>

      <v-divider></v-divider>
    </v-stepper-header>

    <v-stepper-items>
      <v-stepper-content step="1">
        <v-card flat>
          <v-card-text>
            <v-container>
                <v-row class="item">
                    <v-col
                        v-for="ing in ingredientes"
                        cols="12"
                        sm="4"
                        md="4">
                        <v-checkbox
                          v-model="ex4"
                          :label="ing"
                          color="red darken-3"
                          value="red"
                          hide-details
                        ></v-checkbox>
                    </v-col>
                </v-row>
            

            </v-container>
          </v-card-text>
        </v-card>
        
        <v-btn
          color="primary"
          @click="e1 = 2"
        >
          Continue
        </v-btn>

        <v-btn text>
          Cancel
        </v-btn>
      </v-stepper-content>

      <v-stepper-content step="2">
            <row class="item2">
                <v-col
                  cols="12"
                  sm="4"
                  md="4"
                  lg="4"
                >
                    <v-select
                      v-model="variant"
                      :items="tamanos"
                      clearable
                      label="TAMANOS"
                    ></v-select>
                </v-col>
                <v-col
                  cols="12"
                  sm="4"
                  md="4"
                  lg="4"
                >
                    <label for="" class="rating-label">Rating</label>
                    <v-rating
                      v-model="rating"
                      background-color="amber"
                      color="ambewr"
                      large
                    ></v-rating>
                </v-col>
            </row>


        <v-btn
          color="primary"
          @click="obtTiposPizza()"
        >
          Buscar
        </v-btn>

        <v-btn text>
          Cancel
        </v-btn>
      </v-stepper-content>

    </v-stepper-items>
  </v-stepper>

    <v-row 
        >
        <v-col
        v-for="i in tipoPizza"
        cols="12"
        lg="4"
        md="4">
        <v-card
    :loading="loading"
    class="mx-auto my-12"
    max-width="374"
  >
    <template slot="progress">
      <v-progress-linear
        color="deep-purple"
        height="10"
        indeterminate
      ></v-progress-linear>
    </template>

    <v-img
      height="250"
      src="https://cdn.vuetifyjs.com/images/cards/cooking.png"
    ></v-img>

    <v-card-title>{{i.nombre}}</v-card-title>

    <v-card-text>
      <v-row
        align="center"
        class="mx-0"
      >
        <v-rating
          :value="4"
          color="amber"
          background-color="amber"
          dense
          readonly
          size="14"
        ></v-rating>

        <div class="grey--text ms-4">
          4 (413)
        </div>
      </v-row>

      <div class="my-4 text-subtitle-1">
        $ Ingredientes
      </div>

      <ul>
        <li>Salsa de tomate</li>
        <li>Salsa de tomate</li>
      </ul>
    </v-card-text>

    <v-divider class="mx-4"></v-divider>

    <v-card-text>
      <v-chip></v-chip>
    </v-card-text>

    <v-card-actions>
      <v-btn
        color="deep-purple lighten-2"
        text
        @click="reserve"
      >
        Anadir
      </v-btn>
    </v-card-actions>
  </v-card>
        </v-col>
        
    </v-row>


</div>
</template>

<style>
.item{
    display: flex;
    justify-content: center;
    align-items: center;
}
.item2{
    display: flex;
    justify-content: space-around;
    align-items: center;
}
.rating-label{
    font-weight: 500;
}
</style>

<script>
import axios from "axios";
// import Resultado from '../components/Resultado.vue'

export default {
    name: 'busqueda',
    data () {
      return {
        e1: 1,
        ingredientes: [
            'peperoni',
            'mozzarella',
            'tomate',
            'albahaca',
            'parmesano',
            'gorgonzola',
            'fontina',
            'salame',
            'jamon',
            'salsa de tomate',
            'champiñones',
            'aceitunas',
            'piña',
            'cebolla',
            'anchoas'],
        tamanos: [
            'pequeno',
            'mediano',
            'grande',
            'extra-grande'
        ],
        tipoPizza:[]
      }
    },
    methods: {
      reserve () {
        this.loading = true

        setTimeout(() => (this.loading = false), 2000)
      
      },
      async obtTiposPizza () {
       await axios.get("http://127.0.0.1:8000/tipos/json").then((result) => {
        this.tipoPizza = result.data.tipos;
        console.log(this.tipoPizza)
        console.log(result.data);
    })

      }
    },
    created() {
      // this.obtTiposPizza();
    }
    // components: {
    //   Resultado,
    // },
};
</script>

