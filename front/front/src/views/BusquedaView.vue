<template>
<div>
  <Navar/>
  <div>
    <v-expansion-panels
      v-model="panel"
      :disabled="disabled"
      multiple
    >
      <v-expansion-panel>
        <v-expansion-panel-header>Filtra por Ingrediente</v-expansion-panel-header>
        <v-expansion-panel-content>
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
                            v-model="selected"
                            :label="ing.nombre"
                            color="red darken-3"
                            :value="ing.nombre"
                            hide-details
                          ></v-checkbox>
                      </v-col>
                  </v-row>
              </v-container>
            </v-card-text>
          </v-card>
          <v-btn
            color="primary"
            @click="obtTiposPizza()"
          >
            Buscar
          </v-btn>
        </v-expansion-panel-content>
      </v-expansion-panel>
      
      <v-expansion-panel>
        <v-expansion-panel-header>Filtra por Rating</v-expansion-panel-header>
        <v-expansion-panel-content>
            <row class="item2">
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
                      length="10"
                      large
                    ></v-rating>
                </v-col>
            </row>
        <v-btn
          class="btn-busqueda-raiting"
          color="primary"
          @click="buscRating()"
        >
          Buscar
        </v-btn>
        <v-btn
          class="btn-busqueda-raiting"
          color="primary"
          @click="buscMax()"
        >
          Maximo
        </v-btn>
        <v-btn
          class="btn-busqueda-raiting"
          color="primary"
          @click="buscMin()"
        >
          Minimo
        </v-btn>
        </v-expansion-panel-content>
      </v-expansion-panel>
    </v-expansion-panels>
  </div>
  <div>
    <v-row>
        <v-col
        class="tamanos"
          cols="12"
          sm="6"
          md="6"
          lg="6"
        >
          <v-select
            v-model="tam"
            :items="tamanos"
            :value="tamanos"
            solo
            label="TAMANOS"
          ></v-select>
        </v-col>
      </v-row>
      <v-row>
      <v-col
      v-for="i in filterTipo"
      cols="12"
      lg="3"
      md="3">
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
              :src="i.link"
            ></v-img>

            <v-card-title>{{i.nombre}}</v-card-title>

            <v-card-text>
              <v-row
                align="center"
                class="mx-0"
              >
              <v-rating
                :value="i.rating"
                color="amber"
                background-color="amber"
                dense
                readonly
                length="10"
                size="14"
              ></v-rating>
              </v-row>

      <div class="my-4 text-subtitle-1">
        $ Ingredientes
      </div>
      <ul>
        <li
        v-for="j in i.tipo_ingrediente"
        >
        {{j.ingredientes[0].nombre}}</li>
      </ul>
    </v-card-text>

    <v-divider class="mx-4"></v-divider>

    <v-card-text>
      <v-chip>S/.{{i.precio}}</v-chip>
    </v-card-text>

    <v-card-actions>
    <v-btn
      color="deep-purple lighten-2"
      text
      @click="anadirProducto(i._id, i.precio)"
    >
      Anadir
    </v-btn>
    </v-card-actions>
    </v-card>
    </v-col>
    </v-row>
  </div>

  <FooterVue/>
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
.tamanos{
  margin-top: 20px;
  margin-left: 10px;
}
.btn-busqueda-raiting{
  margin-left: 10px;
}
</style>

<script>
import axios from "axios";
import Navar from "../components/Navar.vue";
import FooterVue from "@/components/Footer.vue";
import {Node, BinarySearchTree, ordenar} from "./bst.js";

export default {
    name: 'busqueda',
        
    data () {
      return {
        panel: [0, 1],
        disabled: false,
        readonly: false,
        tamanos: [
            'pequeno',
            'mediano',
            'grande',
            'extra-grande'
        ],
        tipoPizza:[],
        tipoIngrediente:[],
        ingredientes:[],
        selected:[],
        tam:[],
        ing:[],
        filterTipo:[],
        rating:[],
        filterRating:[],
        tipoPizzaid:[],
        binaryFilter:[]
      }
    },
    methods: {
      reserve () {
        this.loading = true
        console.log(ex4)
        setTimeout(() => (this.loading = false), 2000)
      
      },
      async obtTiposPizza () {
       await axios.get("http://127.0.0.1:8000/tipos/json").then((result) => {
        this.tipoPizza = result.data.tipos;

        console.log(this.tipoPizza)
      this.filterTipo = this.tipoPizza.filter(tipo=>tipo.tipo_ingrediente.some(i=>i.ingredientes[0].nombre.includes(this.selected[0]||this.selected[1]||this.selected[2]||this.selected[3]||this.selected[4])) 
      )
      console.log(this.filterTipo)
      console.log(this.selected)
    })
      },
      async obIngredientes (){
        await axios.get("http://127.0.0.1:5000/api/ingredientes").then((result)=>{
          this.ingredientes = result.data;
        })
      },

     async buscRating (){
      class Node {
          constructor(data, left = null, right = null) {
              this.data = data;
              this.left = left;
              this.right = right;
          }
      }

      class BST {
          constructor() {
              this.root = null;
          }
          add(data) {
              const node = this.root;
              if (node === null) {
                  this.root = new Node(data);
                  return;
              } else {
                  const searchTree = function(node) {
                      if (data.rating < node.data.rating) {
                          if (node.left === null) {
                              node.left = new Node(data);
                              return;
                          } else if (node.left !== null) {
                              return searchTree(node.left);
                          }
                      } else if (data.rating > node.data.rating) {
                          if (node.right === null) {
                              node.right = new Node(data);
                              return;
                          } else if (node.right !== null) {
                              return searchTree(node.right);
                          }
                      } else {
                          return null;
                      }
                  };
                  return searchTree(node);
              }
          }
          find(data) {
              let current = this.root;
              while (current.data.rating !== data) {
              console.log(current.data.rating)
              console.log(data);
                  if (data < current.data.rating) {
                      current = current.left;
                  } else {
                      current = current.right;
                  }
                  if (current === null) {
                      return null;
                  }
              }
              return current.data;
          }
      }
      const array = [];
      const ordenar = (a = []) => {
        if (a.length < 3) {
            if (a.length === 1) {
                array.push(a[0])
            } else {
                array.push(a[0])
                array.push(a[1])
            }
            return
        }
        array.push(a[~~(a.length / 2)])
        ordenar(a.slice(0, ~~(a.length / 2)))
        ordenar(a.slice(~~(a.length / 2) + 1))
      }
      await axios.get("http://127.0.0.1:8000/tipos/json").then((result) => {
        this.tipoPizza = result.data.tipos;
        const a =[]
        this.tipoPizza.forEach((data) => {
            a.push(data.rating)
        })
        console.log(a)
        ordenar(a.sort((a,b)=>a-b))
        console.log(a)
        console.log(array)
        const bst = new BST();

        let index = 0
        const ratingPizzaList = []

        while(ratingPizzaList.length != a.length){
          this.tipoPizza.find((obj)=>{
            if (obj.rating === array[0]){
              ratingPizzaList.push(obj)
              array.shift()
            }
          })
          index = index +1
        }
        console.log(ratingPizzaList)
        ratingPizzaList.forEach((data) => bst.add(data))
        
        // console.log(this.rating);
        console.log(bst.find(this.rating))
        this.filterTipo = [bst.find(this.rating)];
      })
      },
    async buscMax (){
      class Node {
          constructor(data, left = null, right = null) {
              this.data = data;
              this.left = left;
              this.right = right;
          }
      }

      class BST {
          constructor() {
              this.root = null;
          }
          add(data) {
              const node = this.root;
              if (node === null) {
                  this.root = new Node(data);
                  return;
              } else {
                  const searchTree = function(node) {
                      if (data.rating < node.data.rating) {
                          if (node.left === null) {
                              node.left = new Node(data);
                              return;
                          } else if (node.left !== null) {
                              return searchTree(node.left);
                          }
                      } else if (data.rating > node.data.rating) {
                          if (node.right === null) {
                              node.right = new Node(data);
                              return;
                          } else if (node.right !== null) {
                              return searchTree(node.right);
                          }
                      } else {
                          return null;
                      }
                  };
                  return searchTree(node);
              }
          }
      findMax() {
          let current = this.root;
          while (current.right !== null) {
              current = current.right;
          }
          return current.data;
      }
      }
      const array = [];
      const ordenar = (a = []) => {
        if (a.length < 3) {
            if (a.length === 1) {
                array.push(a[0])
            } else {
                array.push(a[0])
                array.push(a[1])
            }
            return
        }
        array.push(a[~~(a.length / 2)])
        ordenar(a.slice(0, ~~(a.length / 2)))
        ordenar(a.slice(~~(a.length / 2) + 1))
      }
      await axios.get("http://127.0.0.1:8000/tipos/json").then((result) => {
        this.tipoPizza = result.data.tipos;
        const a =[]
        this.tipoPizza.forEach((data) => {
            a.push(data.rating)
        })
        console.log(a)
        ordenar(a.sort((a,b)=>a-b))
        console.log(a)
        console.log(array)
        const bst = new BST();

        let index = 0
        const ratingPizzaList = []

        while(ratingPizzaList.length != a.length){
          this.tipoPizza.find((obj)=>{
            if (obj.rating === array[0]){
              ratingPizzaList.push(obj)
              array.shift()
            }
          })
          index = index +1
        }
        console.log(ratingPizzaList)
        ratingPizzaList.forEach((data) => bst.add(data))
        
        console.log(this.rating);
        console.log(bst)
        this.filterTipo = [bst.findMax()];
        console.log(this.filterTipo)
      })
      },

    async buscMin(){
      class Node {
          constructor(data, left = null, right = null) {
              this.data = data;
              this.left = left;
              this.right = right;
          }
      }

      class BST {
          constructor() {
              this.root = null;
          }
          add(data) {
              const node = this.root;
              if (node === null) {
                  this.root = new Node(data);
                  return;
              } else {
                  const searchTree = function(node) {
                      if (data.rating < node.data.rating) {
                          if (node.left === null) {
                              node.left = new Node(data);
                              return;
                          } else if (node.left !== null) {
                              return searchTree(node.left);
                          }
                      } else if (data.rating > node.data.rating) {
                          if (node.right === null) {
                              node.right = new Node(data);
                              return;
                          } else if (node.right !== null) {
                              return searchTree(node.right);
                          }
                      } else {
                          return null;
                      }
                  };
                  return searchTree(node);
              }
          }
          findMin() {
              let current = this.root;
              while (current.left !== null) {
                  current = current.left;
              }
              return current.data;
          }
          find(data) {
              let current = this.root;
              while (current.data.rating !== data.rating) {
                  if (data.rating < current.data.rating) {
                      current = current.left;
                  } else {
                      current = current.right;
                  }
                  if (current === null) {
                      return null;
                  }
              }
              return current;
          }
      }
      const array = [];
      const ordenar = (a = []) => {
        if (a.length < 3) {
            if (a.length === 1) {
                array.push(a[0])
            } else {
                array.push(a[0])
                array.push(a[1])
            }
            return
        }
        array.push(a[~~(a.length / 2)])
        ordenar(a.slice(0, ~~(a.length / 2)))
        ordenar(a.slice(~~(a.length / 2) + 1))
      }
      await axios.get("http://127.0.0.1:8000/tipos/json").then((result) => {
        this.tipoPizza = result.data.tipos;
        const a =[]
        this.tipoPizza.forEach((data) => {
            a.push(data.rating)
        })
        console.log(a)
        ordenar(a.sort((a,b)=>a-b))
        console.log(a)
        console.log(array)
        const bst = new BST();

        let index = 0
        const ratingPizzaList = []

        while(ratingPizzaList.length != a.length){
          this.tipoPizza.find((obj)=>{
            if (obj.rating === array[0]){
              ratingPizzaList.push(obj)
              array.shift()
            }
          })
          index = index +1
        }
        console.log(ratingPizzaList)
        ratingPizzaList.forEach((data) => bst.add(data))
        
        console.log(this.rating);
        console.log(bst)
        console.log(bst.find(2))
        this.filterTipo = [bst.findMin()]
        console.log(this.filterTipo)
      })
      },

    
    // async obProducto (){
    //   await axios.post("http://127.0.0.1:5000/api/producto",{
    //     "tipo_id":this.tipoPizzaid._id.$oid,
    //     "tamano":this.tam,
    //     "precio":this.tipoPizzaid.precio
    //   }).then((result)=>{
    //     this.producto = result.data
        
    //   })
    // },
    async anadirProducto(id, precio){
      await axios.get(`http://127.0.0.1:5000/api/tipos/${id}`).then((result)=>{
        this.tipoPizzaid = result.data;
        console.log(this.tipoPizzaid)
        
      })
      await axios.post("http://127.0.0.1:5000/api/producto",{
        "tipo_id":id,
        "tamano":this.tam,
        "precio":precio
      }).then((result)=>{
        this.producto = result.data
        
      })
    }
      
    },
    created() {
      this.obIngredientes();
    },
  components: {
    Navar,
    FooterVue

  },
};
</script>

