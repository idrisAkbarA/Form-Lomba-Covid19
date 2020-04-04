<?php

namespace App\Http\Controllers;

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
            $poster->save();
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
