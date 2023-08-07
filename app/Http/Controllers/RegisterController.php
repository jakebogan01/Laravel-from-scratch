<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('register.create');
    }

    public function store(): \Illuminate\Contracts\Foundation\Application|RedirectResponse|Redirector|Application
    {
        // view all that has been requested from the form
        // dd(request()->all());

        // validate the form
        $attributes = request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:7', 'max:255']
        ]);

        // hash the password. Use the code below if you don't want to use a mutator
        // $attributes['password'] = bcrypt($attributes['password']);

        // create and save the user
        $user = User::create($attributes);

        // log the user in
        auth()->login($user);

        // redirect user
        return redirect('/')->with('success', 'Your account has been created.');
    }
}
