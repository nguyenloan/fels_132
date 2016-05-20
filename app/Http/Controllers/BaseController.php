<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BaseController extends Controller
{
    protected $currentUser;

    public function __construct()
    {
        $this->currentUser = User::find(Auth::user()->id);
    }
}
