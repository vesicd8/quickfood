<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabelRequest;
use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
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
    public function store(LabelRequest $request)
    {
        $name = $request->input('label');

        try {

            $label = new Label();
            $label->label = $name;
            $label->save();

            return response()->json(['message' => "Marker je uspešno kreiran", 'labels' => Label::orderBy('id')->get()], 200);
        }catch (\Exception $e){
            return response()->json(['errors' => ["Došlo je do greške na serveru. Molimo pokušajte kasnije."]], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $errors = [];
        $name = $request->input("labelName");
        $label = Label::find($id);

        if($label == null || $id == null){
            return response()->json(['messages' => ["Marker nije pronadjen."] ], 400);
        }

        if($label->label != $name){
            if(Label::where('label', $name)->first() != null){
                array_push($errors, "Marker već postoji.");
            }
        }

        if(count($errors) == 0){
            $label->label = $name;

            if($label->save()){

                $labels = Label::all();
                return response()->json(['message' => "Marker uspešno izmenjen.", "labels" => $labels], 200);

            }else{

                return response()->json(['messages' => ["Došlo je do greške na serveru. Molimo pokušajte kasnije."] ], 500);

            }
        }else{
            return response()->json(['messages' => $errors ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $label = Label::find($id);

        if($label == null || $id == null){
            return response()->json(['message' => "Marker nije pronadjen." ], 400);
        }

        if(in_array($id, [1,2,3])){
            return response()->json(['message' => "Marker nije moguće obrisati." ], 400);
        }

        if($label->delete()){
            $labels = Label::orderBy('id')->get();

            return response()->json(['message' => 'Marker uspešno obrisan.', 'labels' => $labels], 200);
        }else{
            return response()->json(['message' => "Došlo je do greške na serveru. Molimo pokušajte kasnije."], 500);
        }
    }
}
