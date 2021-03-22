<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Label;
use App\Models\Message;
use App\Models\Product;
use App\Models\Role;
use App\Models\Unit;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    public function index(){
        /*Slider*/
        $this->data['src'] = $this->parallaxImagesSrc[rand(0, count($this->parallaxImagesSrc) - 1)];

        /*Categories*/
        $this->data['categories'] = Category::all();

        /*Labels*/
        $this->data['labels'] = Label::orderBy('id')->get();

         /*Users*/
        $usersQuery = Account::whereHas("role", function ($q){
            $q->where("role", "!=", "Admin");
        })->orderByDesc("id");

        $users = new \stdClass();
        $users->users = $usersQuery->paginate(10);
        $users->notifications = $usersQuery->where("checked", 0)->count();
        $this->data['users'] = $users;

        /*Messages*/
        $messagesQuery = Message::orderByDesc("id");

        $messages = new \stdClass();
        $messages->messages = $messagesQuery->get();
        $messages->notifications = $messagesQuery->where("seen", 0)->count();
        $this->data['messages'] = $messages;

        /*Ingredients*/
        $this->data['ingredients'] = Ingredient::all();

        /*Units*/
        $this->data['units'] = Unit::all();

        return view("admin.pages.admin-section", $this->data);
    }
}
