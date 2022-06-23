<template>
    <v-app id="inspire">
        <v-app-bar
            app
            color="white"
            flat
        >
            <v-avatar
                :color="$vuetify.breakpoint.smAndDown ? 'grey darken-4' : 'transparent'"
                size="32"
            ></v-avatar>

            <v-tabs
                centered
                class="ml-n9"
                color="grey darken-2"
            >
                <v-tab
                    v-for="link in links"
                    :key="link"
                >
                    {{ link }}
                </v-tab>
            </v-tabs>

            <v-avatar

            ></v-avatar>
        </v-app-bar>

        <v-main >
            <v-container>
               <v-img src="https://www.palacios.es/palacios/usuariosFtp/conexion/imagenes148a.jpg"  ></v-img>
            </v-container>
        </v-main>
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

                <v-card-text class="white--text">
                    {{ new Date().getFullYear() }} — <strong>Vuetify</strong>
                </v-card-text>
            </v-card>
        </v-footer>
    </v-app>
</template>

<script>
export default {
    data: () => ({
        icons: [
            'mdi-facebook',
            'mdi-twitter',
            'mdi-instagram',
        ],
        links: [
            'Home',
            'Galeria',
            'Buscar',
            'Login',
        ],
    }),
}
</script>
