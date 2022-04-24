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
            "x-api-key" =>  "fniewyt893y89hfdnalfa",
            "x-localization" => "en",
        ])->post('http://moolah_go_backend:8080/v1/process', [
            'referral_code' => $this->referralCode,
        ]);

        $this->data = $response->body();
    }

    public function render()
    {
        return view('livewire.referral-form');
    }
}
