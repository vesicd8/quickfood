<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\IngredientRequest;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
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
    public function store(IngredientRequest $request)
    {
        $name = $request->input('ingredient');

        $ingredient = new Ingredient();
        $ingredient->ingredient = $name;

        if($ingredient->save()){
            $ingredients = Ingredient::all();
            return response()->json(['message' => "Sastojak uspešno kreiran.", "ingredients" => $ingredients], 200);
        }else{
            return response()->json(['messages' => ["Došlo je do greške na serveru. Molimo pokušajte kasnije."] ], 500);
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
        $name = $request->input("ingredientName");
        $ingredient = Ingredient::find($id);

        if($ingredient == null || $id == null){
            return response()->json(['messages' => ["Sastojak nije pronadjen."] ], 400);
        }

        if($ingredient->ingredient != $name){
            if(Ingredient::where('ingredient', $name)->first() != null){
                array_push($errors, "Sastojak već postoji.");
            }
        }

        if(count($errors) == 0){
            $ingredient->ingredient = $name;

            if($ingredient->save()){

                $ingredients = Ingredient::all();
                return response()->json(['message' => "Sastojak uspešno izmenjen.", "ingredients" => $ingredients], 200);

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
        $ingredient = Ingredient::find($id);

        if($ingredient == null || $id == null){
            return response()->json(['message' => "Sastojak nije pronadjen." ], 400);
        }

        if($ingredient->delete()){
            $ingredients = Ingredient::all();

            return response()->json(['message' => 'Sastojak uspešno obrisan.', 'ingredients' => $ingredients], 200);
        }else{
            return response()->json(['message' => "Došlo je do greške na serveru. Molimo pokušajte kasnije."], 500);
        }
    }
}
