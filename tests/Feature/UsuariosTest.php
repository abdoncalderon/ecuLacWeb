<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsuariosTest extends TestCase
{
    /** @test  */
    
    public function listar_usuarios(){
    
        $response = $this->get('/usuarios');

        $response->assertStatus(200);
    }
}
