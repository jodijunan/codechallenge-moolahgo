<?php

use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ProcessTest extends TestCase
{
    use DatabaseTransactions;

    public function testFoundDataWhenGiveExistReferralCode()
    {
        $user = User::factory()->create();
        $this->json('POST', '/process', ['referralcode' => $user->referralcode])
            ->seeJsonEquals([
                'name' => $user->name,
                'email' => $user->email
            ]);
    }

    public function testNotFoundDataWhenGiveEmptyReferralCode()
    {
        $user = User::factory()->create();
        $this->json('POST', '/process', ['referralcode' => ''])
            ->assertResponseStatus(422);
    }

    public function testNotFoundDataWhenGiveNoExistedReferralCode()
    {
        $user = User::factory()->create([
            'referralcode' => 'AAAAAA'
        ]);
        $this->json('POST', '/process', ['referralcode' => 'AAABBB'])
            ->seeJsonEquals([
                'error' => 'Data not found'
            ])
            ->assertResponseStatus(404);
    }
}
