<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index(RegisterRequest $request)
    {
        User::create($request->all());
        return $this->response()->created();
    }
}
