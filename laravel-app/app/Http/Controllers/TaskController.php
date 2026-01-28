<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Http::get('http://localhost:3002/tasks')->json() ?? [];
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        Http::post('http://localhost:3002/tasks/create', [
            'title' => $request->title,
            'deadline' => $request->deadline,
        ]);

        return redirect('/tasks');
    }

    public function destroy($id)
    {
        Http::delete("http://localhost:3002/tasks/{$id}");
        return redirect('/tasks');
    }
}
