<template>
  <v-container class="fill-height" fluid>
    <v-row align="center" justify="center" dense>
      <v-col cols="12" sm="8" md="4" lg="4">
        <v-card elevation="0">
          <div class="text-center">
            <h1 class="mb-2">Registro</h1>
          </div>
          <a>
            <v-img src="https://dewey.tailorbrands.com/production/brand_version_mockup_image/297/7500890297_a6b93d5a-817d-4b46-bcaf-e240e1f44bd3.png?cb=1656117579"  contain height="130"></v-img>
          </a>
          <v-card-text>
            <v-form>
              <v-text-field label="Ingrese su nombre"
                            name="name"
                            prepend-inner-icon="mdi-account"
                            type="text"
                            class="rounded-0" outlined
                            v-model="formulario.usuario"
              ></v-text-field>
              <v-text-field label="Ingrese su contraseña"
                            name="password"
                            prepend-inner-icon="mdi-lock"
                            type="password"
                            class="rounded-0" outlined
                            v-model="formulario.password"></v-text-field>

              <v-text-field label="Confirme su contraseña" name="password" prepend-inner-icon="mdi-lock-outline" type="password" class="rounded-0" outlined></v-text-field>
              <v-btn class="rounded-0" color="#000000" x-large block dark  @click="register">Registrarse</v-btn>
              <v-card-actions class="text--secondary">
                <v-spacer> ¿Ya tienes una cuenta?</v-spacer>

                <v-btn href="#" class="pl-2" style="color: #000000" to="/">Login </v-btn>
              </v-card-actions>
            </v-form>
          </v-card-text>
          <v-card-actions class="ml-6 mr-6 text-center">
            <p>Al continuar, acepta la Política y los Términos de uso de PIZZA17 <a href="#" class="pl-2" style="color: #000000">Politica</a> y <a href="#" class="pl-2" style="color: #000000">Termino de uso</a></p>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import axios from "axios";
import router from "@/router"

export default {
  name: "RegisterView",
  data(){
    return{
      formulario:{
        usuario:null,
        password:null,
      }
    }
  },
  methods:{
    async register(){
      alert('se ha presionado el boton registrarse');
      const envio = await axios.post('http://localhost:8000/registerVue',this.formulario);
      console.log(envio);
      if(envio.data.usuario){
        router.push('/home')

      }
    }

  }
}
</script>

<style lang="css" scoped>
</style>