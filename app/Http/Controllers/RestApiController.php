<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
@include('AdminController');
class RestApiController extends Controller
{
    //
    public function getAPIgoogle(){
    	echo "123";
    }
}
