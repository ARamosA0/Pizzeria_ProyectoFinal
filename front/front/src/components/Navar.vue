<template>
  <v-app-bar app >
    <v-toolbar-title> <img src="https://dewey.tailorbrands.com/production/brand_version_mockup_image/297/7500890297_a6b93d5a-817d-4b46-bcaf-e240e1f44bd3.png?cb=1656117579" width="100"> </v-toolbar-title>
    <v-spacer></v-spacer>

    <v-btn  to="/home" color="#00C853" > Home </v-btn>


    <v-btn  to="/buscar"  color="#D32F2F"> Buscar </v-btn>


    <v-btn  to="/carrito" color="#F9A825"> Carrito </v-btn>

    <v-btn  to="/" color="#FF9100"> Login </v-btn>


  </v-app-bar>
</template>

<script>

export default {
  name: "Navar"
}
</script>


<style scoped>

</style>