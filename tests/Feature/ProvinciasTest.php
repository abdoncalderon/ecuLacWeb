<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProvinciasTest extends TestCase
{
    /** @test  */

    public function listar_provincias(){

        $response = $this->get('/provincias');

        $response->assertStatus(200);
    }
}
