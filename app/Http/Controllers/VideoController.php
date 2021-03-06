<?php

namespace App\Http\Controllers;
use Telegram;
use App\video;
use App\poster;
use Illuminate\Http\Request;

class VideoController extends Controller
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
    public function peserta()
    {   
        $poster = poster::orderBy('id', 'desc')->get();
        $video = video::orderBy('id', 'desc')->get();
        return response([$poster,$video]);
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
            $video = new video;
            $video->nama = $request['nama'];
            $video->nim = $request['nim'];
            $video->video = $request['video'];
            $video->save();

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
                    'text' => "Lapor! ada peserta lomba <b> Video Kreatif</b> yang mendaftar,\n\nNim: "
                    .$request['nim'].
                    "\nNama: "
                    .$request['nama']."\nLihat karya "
                    ."<a href='".$request['video']."'>disini</a>"
                    ."\n\nHinbo Love you"
                ]);
            }
        
            return $arrId;
            
            return 1;//success
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(video $video)
    {
        //
    }
}
