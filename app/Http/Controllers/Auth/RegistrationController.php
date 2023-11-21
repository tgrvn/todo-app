<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RegistrationController extends Controller
{
    public function create() {
        return Inertia::render('Auth/Register');
    }

    public function store(RegisterUserRequest $request) {
        $data = $request->validated();

        $user = User::create($data);

        auth()->login($user);

        return redirect()->route('todos');
    }
}
