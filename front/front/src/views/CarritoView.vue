<template>
<div>
  <v-card
    class="mx-auto card"
    max-width="1200"
  >
  <div class="card-element-carrito">
        <v-img
            src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
            height="250px"
            max-width="250"
            ></v-img>
        <div>
            <v-card-title class="text-h4">
            Margarita
            </v-card-title>
            <v-card-text class="card-card-text">
                <div class="card-text-precio">
                    <p class="text-h5">S/. 30.00</p>
                </div>
                <div class="card-text-precio">
                    <p class="text-h6">Cantidad::</p>
                </div>
                <v-text-field class="card-text-precio">
                  <v-icon
                    slot="append"
                    color="red"
                  >
                    mdi-plus
                  </v-icon>
                  <v-icon
                    slot="prepend"
                    color="green"
                  >
                    mdi-minus
                  </v-icon>
                </v-text-field>
                <div class="card-text-precio">
                    <p>SubTotal</p>
                    <p>S/. 30.00</p>
                </div>
            </v-card-text>
        </div>
        <v-card-actions>
            <v-btn
                color="red"
                text
            >
                Borrar
            </v-btn>
        </v-card-actions>

  </div>
    
  </v-card>

<v-btn
    color="blue"
    text
>
    COMPRAR
</v-btn>

</div>
</template>

<script>
    export default{
        name:'carrito',
    }
</script>

<style>
    .card{
        margin-top: 3em;
    }
    .card-element-carrito{
        display: flex;
    }
    .card-card-text{
        display: flex;
        justify-content: space-between;
        border-color: black;
    }
    .card-text-precio{
        margin-right: 2em;
    }
</style>