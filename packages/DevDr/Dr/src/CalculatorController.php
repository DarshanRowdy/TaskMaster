<?php

namespace DevDr\Dr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CalculatorController extends Controller
{
    public function add($a, $b){
        $result = $a + $b;
        return view('Dr::add', compact('result'));
    }
}
