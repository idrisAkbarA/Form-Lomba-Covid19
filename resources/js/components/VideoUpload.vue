<template>
  <div>
    <v-container
      fill-height
      fluid
    >
      <v-row>
        <v-col cols="12">
          <v-card elevation="20">
            <v-img
              class="white--text align-end"
              height="200px"
              src="images/video.png"
            ></v-img>
            <v-card-title>
              Upload Video mu!
            </v-card-title>
            <v-container>
              <v-row>
                <v-col cols="6">
                  <v-text-field
                    v-model="nama"
                    @keyup="isAllFilled"
                    prepend-icon="person"
                    filled
                    label="Nama"
                  ></v-text-field>
                </v-col>
                <v-col cols="6">
                  <v-text-field
                    v-model="nim"
                    @keypress="numberOnly($event)"
                    @keyup="isAllFilled"
                    prepend-icon="credit_card"
                    filled
                    label="NIM"
                  ></v-text-field>
                </v-col>
                <v-col cols="12">
                  <v-file-input
                    v-model="file"
                    @change="isAllFilled"
                    filled
                    label="Unggah Video"
                    persistent-hint
                    hint="File Video, Eg. mp4/avi"
                    accept="video/*"
                  ></v-file-input>
                </v-col>
                <v-col>
                  <v-btn
                    class="ml-8"
                    @click="send"
                    :disabled="sendButton"
                    color="red darken-2"
                    dark
                  >Submit Karya</v-btn>
                </v-col>
              </v-row>
            </v-container>
          </v-card>
        </v-col>
      </v-row>

    </v-container>

    <v-dialog
      v-model="dialog"
      persistent
      width="400"
    >
      <v-card
        color="red darken-4"
        dark
      >
        <v-sheet color="red darken-4">
          <v-container
            fluid
            fill-height
          >
            <v-row>
              <v-col cols="12">
                <v-card-title class="mt-0 mb-0">
                  {{loadText}}
                </v-card-title>
              </v-col>
              <v-col cols="12">
                <v-progress-linear
                  height="10"
                  :indeterminate="afterLoad"
                  buffer-value="100"
                  :value="loading"
                  color="white"
                ></v-progress-linear>
              </v-col>
            </v-row>
          </v-container>

        </v-sheet>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loadText: "Initializing",
      afterLoad: false,
      loading: 0,
      dialog: false,
      sendButton: true,
      sheet: false,
      nama: "",
      nim: "",
      file: null,
      accessToken: null,
      refreshToken: null,
      fileId: "",
      webViewLink: ""
    };
  },
  // mounted(){
  //     let recaptchaScript = document.createElement('script')
  //     recaptchaScript.setAttribute('src', 'https://apis.google.com/js/api.js')
  //     document.head.appendChild(recaptchaScript)
  // },
  created() {
    var ini = this;
    console.log("test");
    let uri = window.location.search.substring(1);
    let params = new URLSearchParams(uri);
    // console.log(params.get("code"));

    var client_id =
      "271334780177-barurljabltun9vbepemiktvl3toc24m.apps.googleusercontent.com";

    const code = params.get("code");
    // redirect_uri of the project
    // YiZFiXWyzCmROXh7ea7__v6T
    var redirect_uri = "http://127.0.0.1:8000/submit";
    //const code = this.$route.query.code;
    var client_secret = "YiZFiXWyzCmROXh7ea7__v6T";
    // scope of the project

    var scope = "https://www.googleapis.com/auth/drive";
    axios
      .post("https://www.googleapis.com/oauth2/v4/token", {
        code: code,
        redirect_uri: redirect_uri,
        client_secret: client_secret,
        client_id: client_id,
        scope: scope,
        grant_type: "authorization_code"
      })
      .then(function(response) {
        // console.log(response);
        // console.log(response.data.access_token);
        ini.accessToken = response.data.access_token;
        ini.refreshToken = response.data.refresh_token;
        window.history.pushState({}, document.title, "/submit/");
      })
      .catch(function(error) {
        console.log(error);
      });
  },
  methods: {
    numberOnly(evt) {
      evt = evt ? evt : window.event;
      var charCode = evt.which ? evt.which : evt.keyCode;
      if (
        charCode > 31 &&
        (charCode < 48 || charCode > 57) &&
        charCode !== 46
      ) {
        evt.preventDefault();
      } else {
        return true;
      }
    },
    isAllFilled() {
      console.log(this.file);
      if (!(this.nama == "" || this.nim == "" || this.file == null)) {
        this.sendButton = false;
      } else {
        this.sendButton = true;
      }
    },

    send() {
      this.dialog = true;
      var ini = this;
      var auth = "Bearer" + " " + ini.accessToken;
      // console.log(auth);
      axios({
        method: "post",
        url: "https://www.googleapis.com/upload/drive/v3/files",
        headers: {
          Authorization: auth
        },
        onUploadProgress: function(progressEvent) {
          var percentage = progressEvent.loaded * (100 / progressEvent.total);
          ini.loading = percentage;
          ini.loadText = "Uploading " + Math.round(ini.loading) + "%";
          console.log(ini.loading);
        },

        data: ini.file
      })
        .then(function(response) {
          console.log(response);
          ini.afterLoad = true;
          ini.loadText = "Setting up file... ";
          ini.setPermission(response.data.id);
          ini.fileId = response.data.id;
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    setPermission(fileId) {
      var ini = this;
      var auth = "Bearer" + " " + ini.accessToken;
      axios({
        method: "post",
        url:
          "https://www.googleapis.com/drive/v3/files/" +
          fileId +
          "/permissions",
        headers: {
          Authorization: auth
        },
        data: {
          role: "writer",
          type: "anyone",
          allowFileDiscovery: true
        }
      })
        .then(function(response) {
          var itu = ini;
          itu.getFile();
          // console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    getFile(fileId) {
      console.log(this.fileId);
      var ini = this;
      var auth = "Bearer" + " " + ini.accessToken;
      axios({
        method: "get",
        url: "https://www.googleapis.com/drive/v3/files/" + ini.fileId,
        headers: {
          Authorization: auth
        },
        params: {
          fields: "webViewLink"
        }
      })
        .then(function(response) {
          var itu = ini;
          itu.webViewLink = response.data.webViewLink;
          itu.savetoDB();
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    savetoDB() {
      var ini = this;
      console.log(ini.webViewLink, ini.nama, ini.nim);
      axios({
        method: "get",
        url: "/store/video",
        params: {
          nama: ini.nama,
          nim: ini.nim,
          video: ini.webViewLink
        }
      })
        .then(function(response) {
          var itu = ini;
          console.log(response);
          itu.dialog = false;
          window.location.href = "/takeoff";
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>
