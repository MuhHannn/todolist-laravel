<x-app-layout>
    <style>
        body {
            font-family: sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 10% auto;
            background: #011638;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); /* Ditingkatkan */
        }

        .heading {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: white;
        }

        .error-box {
            margin-bottom: 1rem;
            padding: 1rem;
            background-color: #fee2e2;
            color: #b91c1c;
            border-radius: 6px;
        }

        .error-box ul {
            list-style-type: disc;
            padding-left: 1.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: white;
            margin-bottom: 0.25rem;
        }

        input[type="text"] {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.3);
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .link-back {
            color: #a0a0a0;
            text-decoration: none;
        }

        .link-back:hover {
            text-decoration: underline;
        }

        .btn-submit {
            padding: 0.5rem 1rem;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #2563eb;
        }
    </style>

    <div class="container">
        <h2 class="heading">Edit Task</h2>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="task">Task</label>
                <input
                    type="text"
                    name="task"
                    id="task"
                    value="{{ old('task', $task->task) }}"
                    required
                >
            </div>

            <div class="form-footer">
                <a href="{{ route('tasks.index') }}" class="link-back">← Kembali</a>
                <button type="submit" class="btn-submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</x-app-layout>
