<?php

class AuthControllerTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->email = 'vi@mailtrap.io';
        $this->password = 'test';
        $this->user = \App\User::create([
            'name' => $this->email,
            'email' => $this->email,
            'password' => $this->password,
        ]);
    }

    public function tearDown()
    {
        $this->user->delete();
        parent::tearDown();
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $response = $this->call('GET', '/auth/login');

        $this->assertEquals(200, $response->getStatusCode());

        $response = $this->call('POST', '/auth/login', [
            'email' => $this->email,
            'password' => $this->password,
            '_token' => csrf_token(),
        ]);
        $this->assertRedirectedTo('/');
        $this->assertTrue(Auth::check());
    }

    public function testLogout()
    {
        $this->be($this->user);

        $response = $this->call('GET', '/auth/logout');
        $this->assertRedirectedTo('/');

        $this->assertFalse(Auth::check());
    }

    public function testRegister()
    {
        $this->visit('/auth/register')
            ->see('Register')
            ->type('Test user', 'name')
            ->type('test@ya.ru', 'email')
            ->type('qwe123', 'password')
            ->type('qwe123', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/');

        $this->assertTrue(Auth::check());
    }

}
