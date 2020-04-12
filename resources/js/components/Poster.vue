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
            src="images/poster.png"
          >
          </v-img>

          <v-card-title>
            Lomba Poster
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
            Lomba Poster
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
              lg="9"
            >
              <v-card
                max-height="430"
                class="mx-auto pa-3 overflow-y-auto"
                elevation="21"
              >
                <v-card-title>
                  Kriteria penilaian
                </v-card-title>
                <v-container>
                  <v-row dense>
                    <v-col
                      cols="12"
                      class="d-flex"
                    >
                      <v-simple-table
                        class="mx-auto"
                        style="width:100%; position:realtive;"
                      >
                        <template v-slot:default>
                          <thead>
                            <tr>
                              <th class="text-left">No.</th>
                              <th class="text-left">Kriteria</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>Orisinilitas Karya</td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Format Poster
                                <li>Kesesuaian karya dengan tema</li>
                                <li>Kerangka teori dan kerangka konsep</li>
                                <li>Keunikan karya</li>
                              </td>
                            <tr>
                              <td>3</td>
                              <td>Isi
                                <li>Bagaimana struktur yang ada didalam poster</li>
                                <li>Komposisi gambar: warna dan tata, letak objek dalam gambar</li>
                                <li>Keindahan/sisi artistik penyajian visual</li>
                              </td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>Kualitas poster
                                <li>Penyampaian pesan/komunikasi dalam karya poster</li>
                                <li>Poster yang dibuat mudah dimengerti oleh pembaca</li>
                                <li>Poster Mampu menarik perhatian pembaca</li>
                              </td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>
                                Batas waktu penyerahan karya
                        27 April 2020, pukul 23.59 WIB
                              </td>
                            </tr>
                          </tbody>
                        </template>
                      </v-simple-table>
                    </v-col>
                    <v-col>
                      <v-divider></v-divider>
                    </v-col>
                  </v-row>
                  <v-row class="hidden-md-and-up">
                    <v-col>
                      <v-card
                        @click="dialog = true"
                        color="red darken-3"
                        class="mx-auto overflow-y-auto"
                        elevation="21"
                      >
                        <v-img
                          class="white--text align-end"
                          height="200px"
                          src="images/poster.png"
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
              lg="3"
            >
              <v-card
                color="red darken-3"
                class="mx-auto overflow-y-auto"
                elevation="21"
                @click="dialog = true"
              >
                <v-img
                  class="white--text align-end"
                  height="200px"
                  src="images/poster.png"
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
    <v-dialog
      v-model="dialog"
      width="300"
    >
      <v-card>
        <v-card-title>
          Sebelum itu...
        </v-card-title>
        <v-card-subtitle>
          jika menemui error lakukan seperti dibawah...
        </v-card-subtitle>
         <v-img
          class="white--text align-end"
          height="300px"
          src="images/petunjuk.gif"
          contain
        >
          <template v-slot:placeholder>
            <v-skeleton-loader
            ref="skeleton"
            :loading="loading"
            type="image"
            class="ma-auto "
          >
         </v-skeleton-loader>
          </template>
        </v-img>
        <v-card-actions class="mb-2">
          <v-btn
            block
            @click="signIn"
            color="red darken-5"
          >Mengerti</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
import Axios from "axios";
export default {
  data() {
    return {
      loading:true,
      dialog: false,
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
      var redirect_uri = "https://lomba.ikarin.site/submitposter";

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