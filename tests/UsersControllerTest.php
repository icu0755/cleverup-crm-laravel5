<?php

class UsersControllerTest extends TestCase
{
    public function testNonAuthorizedUser()
    {
        $this->flushSession();
        $response = $this->call('GET', route('users.store'));
        $this->assertRedirectedTo('/auth/login');

        $response = $this->call('GET', route('users.update', [1]));
        $this->assertRedirectedTo('/auth/login');

        $response = $this->call('GET', route('users.index'));
        $this->assertRedirectedTo('/auth/login');
    }
}
