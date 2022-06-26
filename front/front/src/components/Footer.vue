<template>
  <v-footer
      dark
      padless
  >

    <v-card
        flat
        tile
        class="black darken-2 lighten-1 white--text text-center"
    >
      <v-card-text>
        <v-btn
            v-for="icon in icons"
            :key="icon"
            class="mx-4 white--text"
            icon
        >
          <v-icon size="24px">
            {{ icon }}
          </v-icon>
        </v-btn>
      </v-card-text>

      <v-card-text class="white--text pt-0">
        Phasellus feugiat arcu sapien, et iaculis ipsum elementum sit amet. Mauris cursus commodo interdum.
        rsus iaculis dui sollicitudin. Vestibulum eu ipsum vel diam elementum tempor vel ut orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
      </v-card-text>

      <v-divider></v-divider>


    </v-card>
  </v-footer>
</template>

<script>

export default {
  name: "Footer",
  data: () => ({

    icons: [
      'mdi-facebook',
      'mdi-twitter',
      'mdi-instagram',
    ],

  }),
}
</script>


<style scoped>

</style>