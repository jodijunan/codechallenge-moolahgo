<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProcessRepository implements ProcessRepositoryInterface
{
    public function show(Request $request) {
        $validator = Validator::make($request->all(), [
            'referralcode' => 'required|size:6|regex:/[A-Z]+/'
        ]);

        if ($validator->fails()) {
            return response()->json([
                $validator->errors()
            ], 422);
        }

        $user = User::where([
            'referralcode' => $request->referralcode
        ])->first();

        if (empty($user)) {
            return response()->json([
                'error' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'name' => $user->name,
            'email' => $user->email
        ]);
    }
}
