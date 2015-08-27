<?php

class AuthControllerTest extends TestCase {

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $response = $this->call('GET', '/auth/login');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testPasswordRecover()
    {
        $response = $this->call('GET', '/password/email');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testLogout()
    {
        $response = $this->call('GET', '/auth/logout');

        $this->assertRedirectedTo('/');
    }

}
