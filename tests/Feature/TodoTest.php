<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Todos;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_save_todo()
    {
        $this->withoutExceptionHandling();
        $dataToSave = [
            'top_priority' => 'doyoga',
            'goal_date' => 3,
            'secondary_task' => 'berich',
            'note' => 'test',
        ];

        $this->post('/todos', $dataToSave);
        $lastTodo = Todos::orderBy('id', 'DESC')->first();

        $this->assertEquals('berich', $lastTodo->secondary_task);
    }

    public function test_can_update_todo ()
    {
        $this->withoutExceptionHandling();
        $dataToSave = [
            'top_priority' => 'doyoga',
            'goal_date' => 3,
            'secondary_task' => 'berich',
            'note' => 'test',
        ];

        $this->post('/todos', $dataToSave);
        $lastTodo = Todos::orderBy('id', 'DESC')->first();

        $this->assertEquals('berich', $lastTodo->secondary_task);

        $this->put('/todo/'.$lastTodo->id, [
            'goal_date' => 2
        ]);
        
        $lastTodoAgain = Todos::orderBy('id', 'DESC')->first();
        $this->assertEquals( 2, $lastTodoAgain->goal_date);
    }
}
