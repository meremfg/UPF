<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/export');
        $response->assertStatus(200);
    }

    public function testident()
    {
        $response = $this->get('/ident');
        $response->assertStatus(200);
    }
    public function testexport()
    {
        $response = $this->get('/export');
        $response->assertStatus(200);
    }
    public function testgetimage()
    {
        $response = $this->get('/getuserimage/2');
        $response->assertStatus(200);
    }
    public function testputident()
    {
        //test CSRF security
        $response = $this->put('/putident',["nom"=>"Mekouar","prenom"=>"Lamyae","adresse"=>"szegfsdg","email","azerazfazf","ville"=>"azraezf","CodePostale"=>3000,"telephone"=>"154154","dob"=>"2021-01-27","StatuMarital"=>"","PermisDeConduit"=>"B"]);
        echo $response->exception;
        $response->assertStatus(419);
    }
}
