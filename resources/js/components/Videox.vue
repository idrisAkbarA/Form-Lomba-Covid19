<template>
  <div class="mt-2">
    <v-hover>
      <template v-slot="{ hover }">
        <v-card
          @click="sheet=true"
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
              Lomba Video Kreatif
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
    <v-bottom-sheet overlay-color="red darken-4" v-model="sheet">
      <v-sheet class="text-center" height="200px">
        <v-container>
          <v-row>
            <v-col cols="12">
              <h4>Lomba Video Kreatif</h4>
            </v-col>
            <v-col>
              
            </v-col>
          </v-row>
        </v-container>
      </v-sheet>
    </v-bottom-sheet>
  </div>
</template>
<script>
export default {
  data() {
    return {
      sheet:false
    }
  },
};
</script>
<style scoped>
.kelA {
  left: 10px;
  top: -18px;
  position: relative;
}
</style>