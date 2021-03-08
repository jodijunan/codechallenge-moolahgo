<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface ProcessRepositoryInterface
{
    public function show(Request $request);
}
