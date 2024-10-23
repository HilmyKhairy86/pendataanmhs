<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function checkEmail(Request $request)
    {
        $email = $request->input('email');

        $exists = User::where('email', $email)->exists();

        if ($exists) {
            return response()->json(['exists' => true, 'message' => 'Email already taken'], 200);
        } else {
            return response()->json(['exists' => false, 'message' => 'Email is available'], 200);
        }
    }
}
