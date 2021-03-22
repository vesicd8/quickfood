<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
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
    public function store(CategoryRequest $request)
    {
        $name = $request->input("categoryName");
        $parent = $request->input("parentCategory") == 0 ? null : $request->input("parentCategory");

        $category = new Category();
        if(Category::where('name', $name)->first() != null){
            return response()->json(['message' => "Ime kategorije je zauzeto." ], 422);
        }

        $category->name = $name;
        $category->parent_id = $parent;

        if($category->save()){
            $categories = Category::all();
            return response()->json(['message' => "Kategorija uspesno dodata.", "categories" => $categories], 200);
        }else{
            return response()->json(['message' => "Došlo je do greške na serveru. Molimo pokušajte kasnije."], 500);
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
    public function update(CategoryRequest $request, $id)
    {
        $errors = [];
        $categoryName = $request->input('categoryName');
        $parent = $request->input("parentCategory") == 0 ? null : $request->input("parentCategory");

        $category = Category::find($id);

        if($category == null || $id == null){
            return response()->json(['messages' => ["Kategorija nije pronadjena."] ], 400);
        }

        if($category->name != $categoryName){
            if(Category::where('name', $categoryName)->first() != null){
                array_push($errors, "Ime kategorije je zauzeto.");
            }
        }

        if($category->id == $parent){
            array_push($errors, "Kategorija ne moze biti roditelj sama sebi.");
        }

        if(Category::where('id', $parent)->where('parent_id', $id)->first() != null){
            array_push($errors, "Izabrana roditeljska kategorija već pripada ovoj kategoriji.");
        }

        if(count($errors) == 0){
            $category->name = $categoryName;
            $category->parent_id = $parent;

            if($category->save()){

                $categories = Category::all();
                return response()->json(['message' => "Kategorija uspešno izmenjena.", "categories" => $categories], 200);

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
        $messages = [];
        $category = Category::find($id);
        $products = Product::where('category_id', $id)->update([ 'active' => 0, 'category_id' => null]);

        if($category == null || $id == null){
            return response()->json(['message' => "Kategorija nije pronadjena." ], 400);
        }

        Category::where('parent_id', $id)->update(['parent_id' => null]);

        if($category->delete()){
            $categories = Category::all();

            array_push($messages, "Kategorija je uspesno obrisana.");
            if($products > 0){
                array_push($messages, "Zbog brisanja kategorije, neki produkti više nisu aktivni. Proverite tabelu u okviru sekcije 'Produkti'.");
            }

            return response()->json(['messages' => $messages, 'categories' => $categories], 200);
        }else{
            return response()->json(['message' => "Došlo je do greške na serveru. Molimo pokušajte kasnije."], 500);
        }
    }
}
