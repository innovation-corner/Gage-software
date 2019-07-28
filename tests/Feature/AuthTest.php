<?php

use App\Models\User;
use Faker\Factory as Faker;

use Tymon\JWTAuth\Facades\JWTAuth;
use  \Tests\TestCase;
use  \Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function refreshToken()
    {
        $password = 'password';

        $studioMember = factory('App\Models\User')->create();

        $token = JWTAuth::attempt(['email' => $studioMember->email, 'password' => $password]);

        $uri = "/api/auth/refresh?token=$token";

        $reply = $this->call(
            'PATCH',
            $uri,
            ['token' => $token], //parameters
            [], //cookies
            [], // files
            $this->headers($studioMember), // server
            []
        );

        $this->assertArrayHasKey('data', json_decode($reply->getContent(), true));

    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testInvalidateToken()
    {
        $this->refreshApplication();
        $studioMember = factory('App\Models\User')->create(['password' => app('hash')->make('password')]);

        $token = JWTAuth::attempt(['email' => $studioMember->email, 'password' => 'password']);


        $uri = "/api/auth/invalidate?token=$token";

        $reply = $this->call(
            'DELETE',
            $uri,
            ['token' => $token], //parameters
            [], //cookies
            [], // files
            $this->headers($studioMember), // server
            []
        );


        $this->assertArrayHasKey('data', json_decode($reply->getContent(), true));

        $reply->assertStatus(200);
    }


}
