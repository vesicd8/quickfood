<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Account;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Product;
use App\Models\Unit;
use Faker\Factory;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index(){
        $this->data['popularItems'] = Product::with([
            'prices' => function($q){
                $q->orderByDesc('id')->first();
            }
        ])->where('active', true)->whereHas(
            'label', function ($q){
                $q->where('label', "Popularno");
        }
        )->take(6)->get();

        $this->data['src'] = $this->parallaxImagesSrc[rand(0, count($this->parallaxImagesSrc) - 1)];

        return view("public.pages.index", $this->data);
    }

    public function login(LoginRequest $request){
        $username = $request->input('username');
        $password = md5($request->input('password'));

        $user = Account::with(['role', 'reviews', 'status', 'orders'])->where("username", $username)->where("password", $password)->first();

        if($user != null){
            if($user->status->status == "active"){
                $request->session()->put("user", $user);
                switch ($user->role->role){
                    case "Admin":
                        return redirect()->route("admin");
                    case "User":
                        return redirect()->route("home");
                    case "Employee":
                        return redirect()->route("orders");
                }
            }else if($user->status->status == "banned"){
                //banned
            }else{
                //account is not activated
            }
        }else{

        }
    }

    public function register(RegisterRequest $request){

    }

    public function logout(Request $request){
        $request->session()->remove("user");
        return redirect()->route('home')->with(['emptyCart' => true]);
    }

}
