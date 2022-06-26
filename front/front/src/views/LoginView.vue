<template>
  <v-container class="fill-height" fluid >

    <v-row align="center" justify="center" dense >
      <v-col cols="12 " sm="8" md="4" lg="4" >


        <v-card elevation="0" >

          <div class="text-center "  >
            <h1 class="mb-2">BIENVENIDO</h1>
          </div>
          <a>
            <v-img src="https://dewey.tailorbrands.com/production/brand_version_mockup_image/297/7500890297_a6b93d5a-817d-4b46-bcaf-e240e1f44bd3.png?cb=1656117579"  contain height="130"></v-img>
          </a>
          <v-card-text>
            <v-form>
              <v-text-field label="Usuario"
                            name="usuario"
                            prepend-inner-icon="mdi-account"
                            type="usuario" class="rounded-0" outlined
                            v-model="formulario.usuario"
              ></v-text-field>
              <v-text-field
                  label="password"
                  name="password"
                  prepend-inner-icon="mdi-lock"
                  type="password"  class="rounded-0" outlined
                  v-model="formulario.password"
              ></v-text-field>
              <v-btn class="rounded-0" color="#D32F2F" x-large block dark @click="ingresar()">Ingresar</v-btn>
              <v-card-actions class="text--secondary">
                <v-checkbox color="#000000" label="Recordar contraseña"></v-checkbox>
                <v-spacer></v-spacer>
                <v-btn href="#" class="pl-2" style="color: #000000" >Registrate</v-btn>
              </v-card-actions>
            </v-form>
          </v-card-text>

        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import axios from 'axios';
import router from "@/router";
export default {
  name: 'LoginView',
  data(){
    return{
      formulario:{
        usuario:null,
        password:null,
      }
    }
  },
  methods:{
    async ingresar(){
      //alert('se ha presionado el boton ingresar');
      const envio = await axios.post('http://localhost:8000/loginVue',this.formulario);
      console.log(envio);
      if(envio.data.usuario){
        router.push('/home')

      }
    }

  }
}


</script>
<style css>
main{
  background-image: url("https://f.vividscreen.info/soft/8c5dc18232b51fbb258e2575651b7b3c/Pizza-with-mushrooms-and-olives-1920x1200.jpg");

}
</style >