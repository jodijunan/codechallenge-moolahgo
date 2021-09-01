<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function getUserByReferralCodes(Request $request)
    {
        try {
            if (!$request->input('ref') || strlen($request->input('ref')) != 6)
                throw new Exception('Referral code is not valid');

            $user = User::userByReferralCode($request->input('ref'));
            return response()->json($user, $user['success'] ? 200 : 404);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 401);
        }
    }
}
