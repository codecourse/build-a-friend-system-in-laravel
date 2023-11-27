<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendStoreController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function __invoke(User $user, Request $request)
    {
        if ($request->user()->hasPendingFriendRequestFor($user)) {
            return back();
        }

        if ($request->user()->id === $user->id) {
            return back();
        }

        if ($request->user()->friends->contains($user)) {
            return back();
        }

        $request->user()->pendingFriendsTo()->attach($user);

        return back();
    }
}
