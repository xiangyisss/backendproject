<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Todos;
use Illuminate\Http\Request;
use App\Http\Requests\SaveTodoRequest;
use App\Http\Requests\UpdateTodoRequest;


class TodoController extends Controller
{
    public function __construct (Todos $todos)
    { 
        $this->todos = $todos;
    }

    public function index()
    {
        $todolist = $this->todos->get();
        return Inertia::render('Home/Home', compact(
            'todolist'
        ));
    }

    public function about()
    {
        return Inertia::render('About/About');
    }

    public function getTodos()
    {
        return $this->todos->get();
    }

    public function saveTodos( SaveTodoRequest $request)
    {
        $validata = $request->validated();
        $this->todos->create($validata);
    }

    public function updateTodos( $todoId, UpdateTodoRequest $request)
    {
        $validata = $request->validated();
        $this->todos->find($todoId)->update($validata);
    }
}
