<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Ingredient;
use App\Models\ProductPrice;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ProductsController extends Controller
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
    public function store(ProductRequest $request)
    {
        $name = $request->input('productName');
        $category = $request->input('productCategory');
        $price = $request->input('productPrice');
        $description = $request->input('productDescription');
        $unitValue = $request->input('productUnitValue');
        $unit = $request->input('productUnit');
        $image = $request->file('productImage');
        $ingredients = $request->input('productIngredients');
        $label = $request->input('productLabel');
        $url = $request->input('productUrl');

        DB::beginTransaction();
        try {

            $testName = sha1(md5(time() . $image->getClientOriginalName())) . "." .$image->extension();
            $image->move(public_path() . '/assets/img/products/', $testName);

            $product = new Product();
            $product->name = $name;
            $product->category_id = $category;
            $product->unit_id = $unit;
            $product->unit_value = $unitValue;
            $product->description = $description;
            $product->src = $testName;
            $product->label_id = $label;
            $product->url = $url;

            $product->save();
            if($request->input('productIngredients') != null && count($request->input('productIngredients')) != 0){
                $ingredientModels = Ingredient::whereIn('id', $ingredients)->get();
                $product->ingredients()->saveMany($ingredientModels);
            }

            $product->prices()->create([
                'unit_price' => $price
            ]);

            DB::commit();
            return response()->json(['message' => 'Produkt uspešno kreiran.'], 200);

        }catch (\PDOException $ex){
            File::delete(public_path() . '/assets/img/products/', $testName);

            DB::rollBack();
            return response()->json(['message' => "Došlo je do greške na serveru."], 500);
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
        try {
            $product = Product::with([
                'category',
                'pictures' => function($q){
                    $q->orderByDesc('id')->first();
                },
                'ingredients',
                'prices' => function($q){
                    $q->orderByDesc('id')->first();
                },
                'unit'
            ])->find($id);

            return response()->json(['item' => $product], 200);
        }catch (\PDOException $e){
            return response()->json(['message' => "Došlo je do greške na serveru, molimo pokušajte kasnije."], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $errors = [];

        $name = $request->input('productName');
        $category = $request->input('productCategory');
        $price = $request->input('productPrice');
        $description = $request->input('productDescription');
        $unitValue = $request->input('productUnitValue');
        $unit = $request->input('productUnit');
        $image = $request->file('productImage');
        $ingredients = $request->input('productIngredients');
        $label = $request->input('productLabel');
        $url = $request->input('productUrl');

        try {
            DB::beginTransaction();

            $product = Product::with([
                'prices' => function($q){
                    $q->orderByDesc('id')->first();
                },
                'pictures' => function($q){
                    $q->orderByDesc('id')->first();
                }
            ])->find($id);

            if($image != null){

                try {
                    $this->validate($request, [
                        'productImage' => 'mimes:jpg,jpeg,png|between:0,5120|dimensions:ratio=1/1'
                    ], [
                        'productImage.mimes' => "Fajl mora biti formata jpg, jpeg ili png.",
                        'productImage.dimensions' => "Odnos širine i visine slike mora biti 1:1.",
                        'productImage.between' => "Slika ne sme biti veća od 5mb."
                    ]);

                    $newName = sha1(md5(time() . $image->getClientOriginalName())) . "." .$image->extension();
                    $image->move(public_path() . '/assets/img/products/', $newName);

                    File::delete(public_path() . "/assets/img/products/" . $product->src);

                    $product->src = $newName;
                } catch (ValidationException $val){
                    $errors['errors'] = $val->errors();
                }
            }

            if($product->name != $name){
                if(Product::where('name', $name)->first() != null){
                    $errors['errors']['productName'] = ["Produkt sa ovim imenom već postoji."];
                }
            }

            if(count($errors) == 0){
                if($price != $product->price()->unit_price){
                    ProductPrice::where('product_id', $id)->update([
                        'current' => false
                    ]);

                    $product->prices()->create([
                        'unit_price' => $price
                    ]);
                }

                $product->name = $name;
                $product->category_id = $category;
                $product->unit_value = $unitValue;
                $product->description = $description;
                $product->unit_id = $unit;
                $product->label_id = $label;
                $product->url = $url;
                $product->ingredients()->sync($ingredients);

                $product->save();

                DB::commit();
                return response()->json(['message' => "Produkt uspešno izmenjen."]);
            }else{
                DB::rollBack();
                return response()->json($errors, 422);
            }

        }catch (\Exception $exception){
            DB::rollBack();
            return response()->json(['message' => $exception->getMessage()], 500);
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
        $product = Product::find($id);

        if($product == null || $id == null){
            return response()->json(['message' => "Produkt nije pronadjen." ], 400);
        }
        File::delete(public_path() . "/assets/img/products/" . $product->src);
        if($product->forceDelete()){
            return response()->json(['message' => 'Produkt uspešno obrisan.'], 200);
        }else{
            return response()->json(['message' => "Došlo je do greške na serveru. Molimo pokušajte kasnije."], 500);
        }
    }

    public function search(Request $request){
        try {
            $query = DB::table('products');

            if(trim($request->has('name'))){
                $query->where('name', 'like', "%" . $request->get('name') . "%");
            }

            if($request->has('category')){
                $query->where('category_id', $request->get('category'));
            }

            $data = $query->get();

            return response()->json(['products' => $data], 200);
        }catch (\PDOException $ex){
            return response()->json(['message' => "Došlo je do greške na serveru, molimo pokušajte kasnije."], 500);
        }

        return $request->input("category"). " " . $request->input("name");
    }
}
