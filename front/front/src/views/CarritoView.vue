<template>
<div>
<v-container fluid>
<Navar/>
  <v-row>
    <v-col
      v-for="ped in pedido"
      cols="12"
      sm="12"
      md="12"
    >
      <v-card
    
          class="mx-auto card"
          max-width="1200"
        >
        <div 
        class="card-element-carrito">
              <v-img
                  :src="ped.link"
                  height="250"
                  max-width="250"
                  ></v-img>
              <div>
                  <v-card-title class="text-h4">
                  {{ped.nombre}}
                  </v-card-title>
                  <v-card-text class="card-card-text">
                      <div class="card-text-precio">
                          <p class="text-h5">S/. {{ped.precio}}</p>
                      </div>
                      <div class="card-text-precio">
                          <p class="text-h6">Cantidad::</p>
                      </div>
                      <v-text-field 
                      v-model="cantidad"
                      label="*Cantidad*"
                      @change="changeInput(ped.precio)"
                      class="card-text-precio">
                    
                      </v-text-field>
                      <div class="card-text-precio">
                          <p>SubTotal</p>
                          <p>S/. {{precioTotal}}</p>
                      </div>
                  </v-card-text>
              </div>
              <v-card-actions>
                  <v-btn
                      color="red"
                      text
                      @click="borrar(ped)"
                  >
                      Borrar
                  </v-btn>
              </v-card-actions>

        </div>

        </v-card>
    </v-col>
  </v-row>

<v-btn
    class="btn-comprar"
    depressed
    color="#F9A825"
>
    COMPRAR
</v-btn>
</v-container>
<FooterVue/>
</div>
</template>

<script>
import axios from "axios";
import Navar from "../components/Navar.vue";
import FooterVue from "@/components/Footer.vue";

export default {
  name:'CarritoView',
  data: () => ({
    show: false,
    precioTotal:1,
    return :{
      pedido:[],
      producto:[],
      cantidad:1,
    }
  }),


  methods: {
    reserve () {
      this.loading = true
      setTimeout(() => (this.loading = false), 2000)
    },
    obPedido (){
        const retObjet = localStorage.getItem('tipoPizzaId')
        this.pedido = JSON.parse(retObjet)
        console.log(this.pedido)
        // console.log(this.cantidad)
      },
    async obProducto (){
      await axios.post("http://127.0.0.1:5000/api/producto",{
        "idProducto":""
      }).then((result)=>{
        this.producto = result.data
        
      })
    },
    changeInput(precio){
      this.precioTotal = this.cantidad * parseInt(precio)
      console.log(this.precioTotal)
      
    },

    async borrar(nombre){
      const index = this.pedido.indexOf(nombre)
      if(index !== -1){
        await this.pedido.splice(index,1)
      }
      // console.log(this.pedido);
      await localStorage.setItem('tipoPizzaId',JSON.stringify(this.pedido))
      this.obPedido()
    }
      
  },
    
  created() {
    this.obPedido();
  },
  components: {
    Navar,
    FooterVue

  },
}
</script>


<style scoped>
    .card{
        margin-top: 3em;
    }
    .card-element-carrito{
        display: flex;
        justify-content: space-between;
    }
    .card-card-text{
        display: flex;
        justify-content: space-around;
        border-color: black;
        margin-top: 3em;
    }
    .card-text-precio{
        margin-right: 2em;
    }
    .btn-comprar{
      margin-top: 20px;
    }

</style>