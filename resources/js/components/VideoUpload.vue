<v-container>
                      <v-row dense>
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
                          ></v-file-input>
                        </v-col>
                        <v-col>
                          <v-btn
                          @click="send"
                            :disabled="sendButton"
                            color="red darken-2"
                            dark
                          >Submit Karya</v-btn>
                        </v-col>
                      </v-row>
                    </v-container>