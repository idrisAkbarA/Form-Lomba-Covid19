<template>
  <div class="mt-2">
    <v-hover>
      <template v-slot="{ hover }">
        <v-card
          @click="sheet=true"
          :elevation="hover ? 20 : 6"
        >
          <v-img
            class="white--text align-end"
            height="200px"
            src="images/video.png"
          >
          </v-img>

          <v-card-title>
            Lomba Video Kreatif
          </v-card-title>

          <v-card-subtitle>
            Tema: Meningkatkan pemahaman tentang bahaya Covid-19
          </v-card-subtitle>
          <v-card-text>Click untuk melihat rincian</v-card-text>

        </v-card>
      </template>
    </v-hover>
    <v-bottom-sheet
      overlay-color="white"
      v-model="sheet"
    >
      <v-sheet height="70vh">
        <v-card
          flat
          style="z-index:10"
          dark
          class="d-flex justify-center align-self-center kelB"
          max-width="230"
          height="45"
        >
          <span class="mt-1 title">
            Lomba Video Kreatif
          </span>
        </v-card>
        <v-container
          class="kelC"
          fluid
          fill-height
        >
          <v-row>
            <v-col
              cols="12"
              sm="12"
              md="6"
              lg="8"
            >
              <v-card
                color="grey darken-3"
                max-height="430"
                class="mx-auto pa-3 overflow-y-auto"
                elevation="21"
              >
                <v-card-title>
                  Rincian
                </v-card-title>
                <v-container>
                  <v-row
                    dense
                  >
                    <v-col
                      cols="12"
                      class="d-flex"
                    >
                      <span class="mt-1">
                        Batas waktu penyerahan karya
                        1 Januari 2021, pukul 23.59 WIB
                      </span>
                    </v-col>
                    <v-col>
                      <v-divider></v-divider>
                    </v-col>
                    <v-col cols="12"
                      class="d-flex">
                 
                      <span class="mt-1">
                        Tema: Meningkatkan pemahaman tentang bahaya Covid-19
                      </span>
                    </v-col>
                    <v-col>
                      <v-divider></v-divider>
                    </v-col>

                    <v-col
                      cols="12"
                      class="d-flex"
                    >
                      <span class="mt-1">
                        Menyertakan hashtag #dirumahaja, logo lomba, logo himatif didalam video. <a href="http://lomba.ikarin.site/images/logo.png" target="_blank" rel="noopener noreferrer">Download logo</a>
                      </span>
                    </v-col>
                    <v-col>
                      <v-divider></v-divider>
                    </v-col>
                    <v-col
                      cols="12"
                      class="d-flex"
                    >
                      <span class="mt-1">
                        Durasi Video minimal 1 menit, maksimal 5 menit
                      </span>
                      
                    </v-col>
                    <v-col>
                      <v-divider></v-divider>
                    </v-col>
                    
                    <v-col
                      cols="12"
                      class="d-flex"
                    >
                      <span class="mt-1">
                        Upload video ke situs ini <span class="hidden-md-and-up">(Link dibawah)</span> dan Instagram TV serta tandai akun Instagram Himatif USR
                      </span>
                      
                    </v-col>
                    <v-col>
                      <v-divider></v-divider>
                    </v-col>

                    <v-col
                      cols="12"
                      class="d-flex"
                    >
                      <span class="mt-1">
                        Penilaian menekankan pada pesan/makna video dan kreatifitas (editing, plot cerita, dsb )
                      </span>
                      
                    </v-col>
                    <v-col>
                      <v-divider></v-divider>
                    </v-col>

                    
                    <v-col
                      cols="12"
                      class="d-flex"
                    >
                      <span class="mt-1">
                        Karya menjadi hak milik Himatif USR
                      </span>
                    </v-col>
                    <v-col>
                      <v-divider></v-divider>
                    </v-col>
                  </v-row>
                  <v-row class="hidden-md-and-up">
                    <v-col>
                      <v-card
                        @click="signIn"
                        color="red darken-3"
                        class="mx-auto overflow-y-auto"
                        elevation="21"
                      >
                        <v-img
                          class="white--text align-end"
                          height="200px"
                          src="images/video.png"
                        ></v-img>
                        <v-card-title>

                          <p>
                            Sudah Siap?
                          </p>
                          <v-spacer></v-spacer>
                          <p>
                            Submit karya kamu disini!
                          </p>

                        </v-card-title>
                        <v-card-subtitle>
                          <v-card-title>

                          </v-card-title>
                          click untuk submit karya
                        </v-card-subtitle>

                      </v-card>
                    </v-col>
                  </v-row>
                </v-container>
              </v-card>

            </v-col>
            <v-col
              class="hidden-sm-and-down"
              cols="12"
              md="6"
              sm="12"
              lg="4"
            >
              <v-card
                @click="signIn"
                color="red darken-3"
                class="mx-auto overflow-y-auto"
                elevation="21"
              >
                <v-img
                  class="white--text align-end"
                  height="200px"
                  src="images/video.png"
                ></v-img>
                <v-card-title>
                  Sudah Siap? Submit karya kamu disini!
                </v-card-title>
                <v-card-subtitle>
                  click untuk submit karya
                </v-card-subtitle>

              </v-card>

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
import Axios from "axios";
export default {
  data() {
    return {
      sendButton: true,
      sheet: false,
      nama: "",
      nim: "",
      file: null
    };
  },
  methods: {
    signIn() {
      var clientId =
        "271334780177-barurljabltun9vbepemiktvl3toc24m.apps.googleusercontent.com";

      // redirect_uri of the project
      // YiZFiXWyzCmROXh7ea7__v6T
      var redirect_uri = "http://127.0.0.1:8000/submit";

      // scope of the project

      var scope = "https://www.googleapis.com/auth/drive";

      // the url to which the user is redirected to

      var url = "";

      // the actual url to which the user is redirected to

      url =
        "https://accounts.google.com/o/oauth2/v2/auth?redirect_uri=" +
        redirect_uri +
        "&prompt=consent&response_type=code&client_id=" +
        clientId +
        "&scope=" +
        scope +
        "&access_type=offline";

      // this line makes the user redirected to the url

      window.location = url;
    },
    send() {
      var ini = this;
      axios
        .get("/store/video", {
          params: {
            nama: ini.nama,
            nim: ini.nim
          }
        })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    test() {
      console.log(this.nama, this.nim);
    },
    isAllFilled() {
      console.log(this.file);
      if (!(this.nama == "" || this.nim == "" || this.file == null)) {
        this.sendButton = false;
      } else {
        this.sendButton = true;
      }
    }
  }
};
</script>
<style scoped>
.kelA {
  left: 10px;
  top: -18px;
  position: relative;
}
.kelB {
  top: -45px;
  position: relative;
}
.kelC {
  top: -50px;
  position: relative;
}
</style>