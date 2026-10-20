<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        // Altere de 200 para 302, já que a rota redireciona para o login
        $response->assertStatus(302);
    }
}