<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductReviewRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends BaseController
{
    public function index($url){

        $method = "POST";
        $action = route('product.review.store');

        $product = Product::with([
            'reviews' => function($q){
                $q->orderBy('id');
            }
        ])->where('url', $url)->firstOrFail();

        $review = null;

        if(session()->has('user')){
            $user = session()->get('user');
            if(count($user->getReview($product->id)->reviews) != 0){
                $review = $user->getReview($product->id)->reviews[0]->pivot;
                $method = 'PUT';
                $action = route('product.review.update', ['id' => $review->id]);
            }
        }

        $numberOfStars = $product->reviews->count() != 0 ? floor($product->reviews->sum('pivot.stars') / $product->reviews->count()) : 0;

        $this->data['userReview'] = $review;
        $this->data['product'] = $product;
        $this->data['action'] = $action;
        $this->data['method'] = $method;
        $this->data['numberOfStars'] = $numberOfStars;

        $position = [];

        $start = $product->category;
        array_push($position, $start->name);

        while($start->parent){
            array_push($position, $start->parent->name);
            $start = $start->parent;
        };

        $this->data['position'] = array_reverse($position);
        return view('public.pages.product', $this->data);
    }

    public function store(ProductReviewRequest $request){
        $stars = $request->input('productStars');
        $review = $request->input('reviewText');
        $id = $request->input('product');

        if(session()->has('user')){
            try {
                DB::table('product_reviews')->insert([
                   'product_id' => $id,
                    'user_id' => session()->get('user')->id,
                    'stars' => $stars,
                    'comment' => $review
                ]);

                return redirect()->back()->with('success', 'Hvala na odgovoru!');
            }catch (\Exception $ex){
                return redirect()->back()->with('error', 'Došlo je do greške na serveru, molimo pokušajte kasnije.');
            }
        }else{
            return redirect()->back()->with('error', "Morate biti ulogovani.");
        }
    }

    public function update(ProductReviewRequest $request, $id){
        $stars = $request->input('productStars');
        $review = $request->input('reviewText');

        if(session()->has('user')){
            try {
                DB::table('product_reviews')
                    ->where('id', $id)
                    ->update([
                        'comment' => $review,
                        'stars' => $stars
                    ]);

                return redirect()->back()->with('success', 'Hvala na odgovoru!');
            }catch (\Exception $ex){
                return redirect()->back()->with('error', 'Došlo je do greške na serveru, molimo pokušajte kasnije.');
            }
        }else{
            return redirect()->back()->with('error', "Morate biti ulogovani.");
        }
    }

    public function destroy($id){
        if(session()->get('user')){
            try {
                $review = DB::table('product_reviews')->where('id', $id)->first();

                if($review->user_id != session()->get('user')->id && session()->get('user')->role->role != "Admin"){
                    return redirect()->back()->with(['success' => "Greška."]);
                }else{
                    DB::table('product_reviews')->delete($id);
                    return redirect()->back()->with(['success' => "Recenzija uspešno obrisana."]);
                }
            }catch (\Exception $ex){
                return redirect()->back()->with(['success' => $ex->getMessage()]);
            }
        }else{
            return redirect()->back()->with(['error' => "Morate se ulogovati."]);
        }
    }
}
