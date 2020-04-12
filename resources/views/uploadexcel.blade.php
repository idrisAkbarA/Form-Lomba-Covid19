@extends('layouts.app')

@section('content')
<v-container fill-height>
    <v-row>
        <v-col>
            <v-card class="mx-auto pa-5">
                    <v-file-input v-model="file"> </v-file-input>
                    <v-btn @click="send">upload</v-btn>
            </v-card>
        </v-col>
    </v-row>
</v-container>
@endsection