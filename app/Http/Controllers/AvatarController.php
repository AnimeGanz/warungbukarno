<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|max:2048',
        ]);

        $user = auth()->user();

        if ($user->avatar) {
            Storage::disk('s3')->delete($user->avatar);
        }

        $path = $request->file('avatar')->store('avatars', 's3');

        $user->update(['avatar' => $path]);

        return back()->with('status', 'avatar-updated');
    }
}