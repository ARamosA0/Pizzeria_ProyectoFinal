<template>
  <Navar/>
</template>

<script>
import Navar from "../components/Navar.vue";

export default {
  data: () => ({
    show: false,
  }),


  methods: {
    reserve () {
      this.loading = true

      setTimeout(() => (this.loading = false), 2000)
    },
  },
  name: "CarritoView",
  components: {
    Navar,

  },
}
</script>

<style scoped>

</style>