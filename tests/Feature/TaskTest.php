<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_task()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'sanctum');

        $response = $this->postJson('/api/tasks', [
            'title' => 'Test Task',
            'description' => 'Test Description',
            'due_date' => now()->addDay()->toDateString(),
            'status' => 'pending',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tasks', ['title' => 'Test Task']);
    }

    public function test_user_can_view_own_tasks()
    {
        $user = User::factory()->create();
        Task::factory()->for($user)->create(['title' => 'User Task']);

        $this->actingAs($user, 'sanctum');

        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200)
                 ->assertJsonFragment(['title' => 'User Task']);
    }

    public function test_task_creation_fails_with_invalid_data()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'sanctum');

        // Enviar datos inválidos
        $response = $this->postJson('/api/tasks', [
            'title' => '', // Título vacío
            'due_date' => 'invalid-date', // Fecha inválida
            'status' => 'invalid-status', // Estado inválido
        ]);

        // Verificar que la respuesta tiene errores de validación
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['title', 'due_date', 'status']);
    }
}
