<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $headers = ['Accept' => 'application/json'];

    public function headers($user)
    {
        $headers = ['Accept' => 'application/json'];

        if (!is_null($user)) {
            $token = JWTAuth::fromUser($user);
            JWTAuth::setToken($token);
            $headers['Authorization'] = 'Bearer ' . $token;
        }

        return $headers;
    }

    // source from https://github.com/astralapp/astral/blob/0ec1bb9f2df970fab6a2ee9130a6d421d0cdc73c/tests/TestCase.php

    public function login($user = null)
    {
        $user = $user ? : factory(User::class)->create();
        $token = auth()->login($user);

        $this->headers['Authorization'] = 'Bearer ' . $token;

        return $this;
    }

    public function call($method, $uri, $parameters = [], $cookies = [], $files = [], $server = [], $content = null)
    {
        $applicationJson = $this->transformHeadersToServerVars($this->headers);
        $server = array_merge($server, $applicationJson);
        return parent::call($method, $uri, $parameters, $cookies, $files, $server, $content);
    }
}
