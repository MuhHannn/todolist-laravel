<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:255',
        ]);

        Task::create([
            'user_id' => Auth::id(),
            'task' => $request->task,
            'is_completed' => false,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task berhasil ditambahkan!');
    }

    public function show($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'task' => 'required|string|max:255',
        ]);

        $task = Task::where('user_id', Auth::id())->findOrFail($id);

        // Update task saja
        $updateData = ['task' => $request->task];

        // Ubah status jika ada input is_completed
        if ($request->has('is_completed')) {
            $task->is_completed = $request->is_completed;
            $task->save();

            // Redirect tanpa flash message
            return redirect()->route('tasks.index');
        }

        $task->update($updateData);

        return redirect()->route('tasks.index')->with('success', 'Task berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task berhasil dihapus.');
    }

    public function markAsDone($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        $task->update(['is_completed' => true]);

        return redirect()->route('tasks.index');
    }

    public function markAsUndone($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        $task->update(['is_completed' => false]);

        return redirect()->route('tasks.index');
    }
}

    