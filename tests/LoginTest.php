<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginTest extends WebTestCase
{
    public function testLoginSuccess(): void
    {
        $client = static::createClient();

        
        $crawler = $client->request('GET', '/login');

        
        $this->assertResponseIsSuccessful();

       
        $form = $crawler->filter('form')->form();

       
        $form['email'] = 'test@test.com';
        $form['password'] = 'password';

        
        $client->submit($form);

    
        $this->assertResponseRedirects();
    }
}