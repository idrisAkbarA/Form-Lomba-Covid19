<template>
  <div>
    <v-container>
      <v-row>
        <v-col
          cols="12"
          lg="6"
          md="12"
          sm="12"
        >
          <v-card>
            <v-card-title>
              Peserta Poster
            </v-card-title>
            <v-simple-table v-if="isPoster"
            >
              <template v-slot:default>
                <thead>
                  <tr>
                    <th class="text-left">No.</th>
                    <th class="text-left">NIM</th>
                    <th class="text-left">Nama</th>
                    <th class="text-left">Karya</th>
                  </tr>
                </thead>
                <tbody>
                  <tr 
                    v-for="(item,index) in poster"
                    :key="index"
                  >
                    <td>{{ index+1 }}</td>
                    <td>{{ item.nim }}</td>
                    <td>{{ item.nama }}</td>
                    <td><v-btn @click="download(item.poster)">Download</v-btn></td>
                  </tr>
                </tbody>
              </template>
            </v-simple-table>
            <v-card-subtitle v-else>
              Belum ada peserta
            </v-card-subtitle>
          </v-card>
        </v-col>
        <v-col
          cols="12"
          lg="6"
          md="12"
          sm="12"
        >
           <v-card>
            <v-card-title>
              Peserta Video Kreatif
            </v-card-title>
            <v-simple-table v-if="isVideo"
            >
              <template v-slot:default>
                <thead>
                  <tr>
                    <th class="text-left">No.</th>
                    <th class="text-left">NIM</th>
                    <th class="text-left">Nama</th>
                    <th class="text-left">Karya</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(item,index) in video"
                    :key="index"
                  >
                    <td>{{ index+1 }}</td>
                    <td>{{ item.nim }}</td>
                    <td>{{ item.nama }}</td>
                    <td><v-btn @click="download(item.video)">Download</v-btn></td>
                  </tr>
                </tbody>
              </template>
            </v-simple-table>
            <v-card-subtitle v-else>
              Belum ada peserta
            </v-card-subtitle>
            
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>
<script>
export default {
  data() {
    return {
      isPoster:false,
      isVideo:false,
      poster:null,
      video:null,
    }
  },
  mounted() {
    this.getData();
  },
  methods: {
    isPosterNull(){
      if(this.poster == null || this.poster == ""){
        this.isPoster =  false;
      }else{
        this.isPoster =  true;
        
      }
    },
    isVideoNull(){
      if(this.video == null || this.video == ""){
        console.log("null")
        this.isVideo =  false;
      
      }else{
        this.isVideo =  true;
        
      }
    },
    download(url) {
      var win = window.open(url, "_blank");
      win.focus();
    },
    getData(){
      var ini = this;
      axios({
        method:"get",
        url:"get/peserta",
      }).then(function(response){
        console.log(response.data);
        ini.poster = response.data['0'];
        ini.video = response.data['1'];
        console.log("poster:" + ini.poster);
        console.log("video:" +ini.video);
        ini.isVideoNull();
        ini.isPosterNull();
      }).catch(function(error){
        console.log(error);
        ini.getData();
      });
    }
  }
};
</script>