<template>
<div>

  <v-container>
    <v-row>
      <v-col cols="12">
        <v-parallax
          dark
          src="images/corona-BG.png"
        >
          <v-row
            align="center"
            justify="center"
          >

          </v-row>
        </v-parallax>
        <v-row class="mb-10">
          <v-col
            class="text-center"
            cols="12"
          >
            <h1
              class="display-1 font-weight-thin mb-4"
              style="text-shadow: 2px 2px 10px #000;"
            >Ayo ikuti lomba!</h1>
            <h4
              class="subheading"
              style="text-shadow: 2px 2px 10px #000;"
            >Cegah Covid-19 dengan mengikuti lomba dan menangkan wisuda 3.5 tahun!</h4>
          </v-col>
        </v-row>
      </v-col>
      <v-col
        cols="12"
        xs="12"
        sm="12"
        md="6"
        lg="6"
        xl="6"
      >
        <poster></poster>
      </v-col>
      <v-col
        cols="12"
        xs="12"
        sm="12"
        md="6"
        lg="6"
        xl="6"
      >
        <videox></videox>
      </v-col>
      <v-col
        class="mt-2"
        cols="12"
      >
        <h4 class=" subheading">
          Buat kamu mahasiswa Teknik Informatika UIN SUSKA Riau, ayo ikuti lomba poster dan video kreatif!
        </h4>
        <p class="font-weight-light"> Wabah Covid-19 dengan mudah dapat menyebar dan menginfeksi seseorang, namun masih banyak orang-orng yang acuh tak acuh terhadap wabah ini. Oleh karena itu mari kita sebarkan informasi mengenai dampak bahaya Covid-19 ke semua orang! Agar kita semua tidak terinfeksi.</p>
      </v-col>
    </v-row>
  </v-container>
  <v-dialog 
    v-model="dialog"
    width="500"
  >
    <v-card>
      <v-img
              class="white--text align-end"
              height="200px"
              src="images/takeoff.png"
            ></v-img>
            <v-card-title>
              Upload berhasil!
            </v-card-title>
            <v-card-subtitle>
              Terimakasih sudah berpartisipasi!
            </v-card-subtitle>
            <v-card-text>
              <p>
              Tunggu pengumumannya pada tanggal 4 Mei di akun instagram Himatif USR. 
              </p>
              <p>
              Stay save, Hinbo Loves you...
              </p>
            </v-card-text>
    </v-card>
  </v-dialog>
</div>
</template>
<script>
export default {
  data() {
    return {
      dialog:true,
    }
  },
};
</script>