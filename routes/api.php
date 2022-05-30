<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('process', 'ReferralCodeController@findOwnerDetails');

