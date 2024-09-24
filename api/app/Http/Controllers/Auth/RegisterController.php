<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        return response()->json($user, 201);
    }
}
