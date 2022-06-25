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
          @click="e1 = 1"
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
        v-for="i in 6"
        cols="12"
        lg="4"
        md="4">
            <Resultado/>
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
import Resultado from '../components/Resultado.vue'

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
        ]
      }
    },
    components: {
      Resultado,
    },
};
</script>

