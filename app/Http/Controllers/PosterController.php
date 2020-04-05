<?php

namespace App\Http\Controllers;
use Telegram;
use App\poster;
use Illuminate\Http\Request;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        try {
            $poster = new poster;
            $poster->nama = $request['nama'];
            $poster->nim = $request['nama'];
            $poster->poster = $request['poster'];
            $poster->save();

            $response = Telegram::getUpdates();
            $arrId =[];
            for ($i=0; $i < sizeof($response); $i++) { 
                $id = $response[$i]['message']['from']['id'];
                if(!in_array($id,$arrId)){
                    array_push($arrId,$id);
                }
            }
            for ($i=0; $i < sizeof($arrId) ; $i++) { 
                Telegram::sendMessage([
                    'chat_id' => "$arrId[$i]",
                    'parse_mode' => 'HTML',
                    'text' => "Lapor! ada yang mendaftar lomba <b>Poster</b>,\n\nNim: "
                    .$request['nim'].
                    "\nNama: "
                    .$request['nama']."\nLink Karya:\n\n"
                    .$request['poster']
                    ."\n\nHinbo Love you"
                ]);
            }
        
            return $arrId;
            return 1; //success
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function show(poster $poster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function edit(poster $poster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, poster $poster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function destroy(poster $poster)
    {
        //
    }
}
