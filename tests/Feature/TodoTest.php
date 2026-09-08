<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TodoTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_todo_can_be_created(): void
    {
        $response = $this->post('/todos', [
            'title' => 'Belajar Continuous Integration',
        ]);

        $response->assertRedirect('/todos');

        $this->assertDatabaseHas('todos', [
            'title' => 'Belajar Continuous Integration',
        ]);
    }

    public function test_a_todo_requires_a_title(): void
    {
        $response = $this->post('/todos', ['title' => '']);

        $response->assertSessionHasErrors('title');
    }
}
