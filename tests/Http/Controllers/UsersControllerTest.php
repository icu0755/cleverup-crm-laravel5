<?php

class UsersControllerTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->user = \App\User::create([
            'name' => 'vi@mailtrap.io',
            'email' => 'vi@mailtrap.io',
            'password' => 'test',
        ]);
    }

    public function tearDown()
    {
        $this->user->delete();
        parent::tearDown();
    }

    public function testNonAuthorizedUser()
    {
        $response = $this->call('GET', route('users.store'));
        $this->assertRedirectedTo('/auth/login');

        $response = $this->call('GET', route('users.update', [$this->user->id]));
        $this->assertRedirectedTo('/auth/login');

        $response = $this->call('GET', route('users.index'));
        $this->assertRedirectedTo('/auth/login');
    }
}
