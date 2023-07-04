<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller{
    protected $_path = 'public-part.';

    public function home(){
        return view($this->_path. 'home');
    }
    public function test(){
        return view($this->_path. 'test');
    }
}
