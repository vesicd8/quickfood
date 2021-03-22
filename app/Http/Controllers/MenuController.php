<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Label;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends BaseController
{
    private const PER_PAGE = 6;
    private const SORT_TYPES = [
        'Inicijalno' => 'default',
        'Cena rastuće' => 'price-asc',
        'Cena opadajuće' => 'price-desc'
    ];

    public function index(Request $request){

        $item = Product::whereHas('label', function ($q){
            $q->where('label', "Popularno");
        })->inRandomOrder()->first();

        $products = Product::with([
            'category',
            'label'
        ])->join('product_prices', 'products.id', '=', 'product_prices.product_id')
            ->select('product_prices.unit_price as unit_price', 'products.*')
            ->where('product_prices.current', true);

        if($request->has('productCategory')){
            $products = $products->whereHas('category', function ($q) use ($request){
                $q->whereIn('name', $request->get('productCategory'));
            });
        }

        if($request->has('productKeyword')){
            $products = $products->where('name', 'like', "%" . $request->get('productKeyword') . "%");
        }

        if($request->has('label')){
            $products = $products->whereHas('label', function ($q) use ($request){
               $q->whereIn('label', $request->get('label'));
            });
        }

        if($request->has('sortBy')){
            switch ($request->get('sortBy')){
                case 'price-asc' :
                    $products = $products->orderBy('product_prices.unit_price');
                    break;
                case 'price-desc' :
                    $products = $products->orderByDesc('product_prices.unit_price');
                    break;
                default :
                    $products = $products->orderBy('category_id')->orderBy('name');
                    break;
            }
        }else{
            $products = $products->orderBy('category_id')->orderBy('name');
        }

        $products = $products->paginate(self::PER_PAGE)->withQueryString();

        $this->data['products'] = $products;
        $this->data['categories'] = Category::has('products')->get();
        $this->data['labels'] = Label::where('label', '!=', 'Nema')->get();
        $this->data['sort'] = self::SORT_TYPES;
        $this->data['item'] = $item;

        return view('public.pages.menu', $this->data);
    }

    public function getProduct($id){
        try {
            if(session()->has('user')){
                $product = Product::find($id);

                $response = new \stdClass();
                $response->id = $product->id;
                $response->name = $product->name;
                $response->price = $product->price()->unit_price;

                return response()->json($response);
            }else{
                return response()->json(['message' => 'Morate se ulogovati kako bi vam pristup korpi bio omogućen.'], 401);
            }
        }catch (\Exception $ex){
            return response()->json(['message' => $ex->getMessage()], 500);
        }

    }

    public function product($url){

    }
}
