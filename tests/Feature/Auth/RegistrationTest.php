<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase; //resetar o BD a cada teste

    /** @test */
    public function user_can_register_with_valid_data()
    {
        // Puxar os perfis do BD para teste
        $this->seed(\Database\Seeders\RolesAndPermissionsSeeder::class);

        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'telefone' => '999999999',
            'cpf_cnpj' => '12345678901',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        // Envia os dados para o endpoint de registro
        $response = $this->postJson('/api/register', $userData);

        // Verificar se 201 (Created) é retornado
        $response->assertStatus(201)
                 ->assertJsonStructure([ // Verifica se a resposta tem a estrutura de token
                     'access_token',
                     'token_type'
                 ]);
        // Verifica se o usuário foi criado no banco de dados
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'cpf_cnpj' => '12345678901'
        ]);   
    }
}