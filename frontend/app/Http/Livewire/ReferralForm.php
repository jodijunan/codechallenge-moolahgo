<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ReferralForm extends Component
{
    public $referralCode;
    public $data;

    public function submit()
    {
        $response = Http::withHeaders([
            "Content-Type" =>  "application/json",
            "Accept" =>  "application/json",
            "x-api-key" =>  env('API_KEY_BACKEND_MOOLAHGO'),
            "x-localization" => "en",
        ])->post(env('BACKEND_MOOLAHGO'), [
            'referral_code' => $this->referralCode,
        ]);

        $this->data = $response->body();
    }

    public function render()
    {
        return view('livewire.referral-form');
    }
}
