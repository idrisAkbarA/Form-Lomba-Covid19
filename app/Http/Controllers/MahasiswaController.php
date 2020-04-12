<?php

namespace App\Http\Controllers;
use Excel;
use App\mahasiswa;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Imports\mhsImport;
use App\Exports\mhsExport;
use App\Imports\mhsXImport;

class MahasiswaController extends Controller
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
        // return $request->file->getClientOriginalName();
        // $fileName = $request->file->getClientOriginalName();
        // $request->file->move(public_path('files'), $fileName);
        Excel::import(new mhsImport, $request->file);
        return mahasiswa::all();

    }
    function getCharPosition($findme,$string){
        $pos = strpos($string,$findme);
            if ($pos === false) {
               return null;
            } else {
                return $pos;
            }
    }
    public function getExcel(){
        return Excel::download(new mhsExport, 'mahasiswa.xlsx');
    }
    public function storeX(Request $request)
    {   
        //*convert excel to array
        $data = \Excel::toArray('',$request->file);
        $newData= [];
        for ($i=0; $i <sizeof($data[0]) ; $i++) { 
            $temp= filter_var($data[0][$i][0], FILTER_UNSAFE_RAW, FILTER_FLAG_ENCODE_LOW|FILTER_FLAG_STRIP_HIGH);
            $start = $this->getCharPosition('.',$temp);
            $end = $this->getCharPosition('(',$temp);
            if($end == null){
                $end = $this->getCharPosition("/",$temp);
             }
             $substracted = substr($temp,$start+1,$end-3);
             $trimmed = trim($substracted);
            $arrTemp = [$trimmed,$data[0][$i][1]];
            array_push($newData,$arrTemp);
        }
        $arrSearch=[];
        // foreach ($newData as $key => $value) {
        //     $temp = mahasiswa::where('nama',$value[0])->get();
        //     if(sizeof($temp)<1){
        //         continue;
        //     }
        //     $mhs = mahasiswa::find($temp[0]['nim']);
        //     $mhs->departemen = $value[1];
        //     $mhs->save(); 
        //     array_push($arrSearch,[$value[0],$temp[0]['nim']]);
        // }
        foreach ($newData as $key => $value) {
            $temp = mahasiswa::where('nama',$value[0])->get();
            if(sizeof($temp)<1){
                array_push($arrSearch,[$value[0],"not Found"]);
            }else{
                array_push($arrSearch,[$value[0],$temp[0]['nama']]);
             }
         }
        return $arrSearch;
        return $newData;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(mahasiswa $mahasiswa)
    {
        //
    }
}
