<x-app-layout>
    <style>
        /* Gunakan kembali style dari create.blade.php */
    </style>

    <div class="container">
        <h2>Edit Task</h2>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="task">Nama Task</label>
                <input type="text" name="task" id="task" value="{{ old('task', $task->task) }}" required>
            </div>

            <input type="hidden" name="is_completed" value="{{ $task->is_completed }}">

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</x-app-layout>
