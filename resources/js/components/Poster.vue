<template>
  <div class="mt-2">
    <v-hover>
      <template v-slot="{ hover }">
        <v-card
        @click=""
          :elevation="hover ? 20 : 6"
        >
          <v-card
            style="z-index:10"
            dark
            class="d-flex justify-center align-self-center kelA"
            color="red darken-4"
            max-width="210"
            height="45"
          >
            <span class="mt-1 title">
              Lomba Poster
            </span>
          </v-card>
          <div style="margin-top:-20px">
          <v-card-subtitle>
            Tema: Meningkatkan pemahaman tentang bahaya Covid-19
          </v-card-subtitle>
          <v-card-text>Click untuk melihat rincian</v-card-text>

          </div>
        </v-card>
      </template>
    </v-hover>
  </div>
</template>
<script>
export default {};
</script>
<style scoped>
.kelA {
  left: 10px;
  top: -18px;
  position: relative;
}
</style>