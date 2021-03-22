<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $data;
    protected $parallaxImagesSrc = ['assets/img/parallax/cover1.jpg', 'assets/img/parallax/cover2.jpg', 'assets/img/parallax/cover3.jpg'];
    protected $sliderImagesSrc = [];

}
