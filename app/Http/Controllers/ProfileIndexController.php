<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileIndexController extends Controller
{
    public function __invoke(User $user)
    {
        return view('profile.index', [
            'user' => $user
        ]);
    }
}
