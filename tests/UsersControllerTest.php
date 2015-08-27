<?php

class UsersControllerTest extends TestCase
{
    public function testNonAuthorizedUser()
    {
        $response = $this->call('GET', '/users/create');
        $this->assertRedirectedTo('/');

        $response = $this->call('GET', '/users/edit/1');
        $this->assertRedirectedTo('/');

        $response = $this->call('GET', '/users/');
        $this->assertRedirectedTo('/');
    }
}
