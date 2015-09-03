<?php

use \Mockery as m;

class PasswordControllerTest extends TestCase
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

    public function testEmail()
    {
        $user = $this->user;
        $subject = 'Your Password Reset Link';

        Mail::shouldReceive('send')->once()->with(
            'emails.password',
            m::on(function ($data) {
                $this->assertArrayHasKey('user', $data);
                return true;
            }),
            m::on(function (\Closure $closure) use ($user, $subject) {
                $mock = m::mock('Illuminate\Mail\Message');
                $mock->shouldReceive('to')->once()->with($user->email)
                    ->andReturn($mock); //simulate the chaining
                $mock->shouldReceive('subject')->once()->with($subject);
                $closure($mock);
                return true;
            })
        );

        $this->visit('/password/email')
            ->see('Reset Password')
            ->type($this->email, 'email')
            ->press('Send Password Reset Link');

    }


    public function testReset()
    {
        $this->get('/password/reset')->assertResponseStatus(404);

        $tokens = $this->app['auth.password.tokens'];
        $token = $tokens->create($this->user);

        $oldPassword = $this->user->password;
        $this->visit(sprintf('password/reset/%s', $token));
        $this->type('vi@mailtrap.io', 'email')
            ->type('123qwe', 'password')
            ->type('123qwe', 'password_confirmation')
            ->press('Reset Password');

        $this->assertTrue(Auth::check());

        $user = \App\User::find($this->user->id);
        $this->assertNotEquals($oldPassword, $user->password);

    }

}
