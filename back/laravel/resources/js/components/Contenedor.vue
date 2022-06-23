<template>
    <v-container class="fill-height" fluid>

        <v-row align="center" justify="center" dense>
            <v-col cols="12" sm="8" md="4" lg="4">


                <v-card elevation="0">

                    <div class="text-center">
                        <h1 class="mb-2">BIENVENIDO</h1>
                    </div>
                    <a>
                        <v-img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRL6qK-wegYdFz17dar-7W3abeLXbahEqedA1hag9wGQzyyNBfXcPtswZFYsZS2csuheHA&usqp=CAU"  contain height="200"></v-img>
                    </a>
                    <v-card-text>
                        <v-form>
                            <v-text-field label="Usuario" name="usuario" prepend-inner-icon="mdi-account" type="usuario" class="rounded-0" outlined></v-text-field>
                            <v-text-field label="Contraseña" name="contraseña" prepend-inner-icon="mdi-lock" type="contraseña"  class="rounded-0" outlined></v-text-field>
                            <v-btn class="rounded-0" color="#D32F2F" x-large block dark>Ingresar</v-btn>
                            <v-card-actions class="text--secondary">
                                <v-checkbox color="#000000" label="Recordar contraseña"></v-checkbox>
                                <v-spacer></v-spacer>
                                <a href="#" class="pl-2" style="color: #000000">Registrate</a>
                            </v-card-actions>
                        </v-form>
                    </v-card-text>

                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    name: 'app-login',
}


</script>



