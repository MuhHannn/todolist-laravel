<x-app-layout style="display: flex;align-items:center; justify-content:center;">
    <style>
        .container {
            max-width: 600px;
            margin: 10% auto;
            background: #011638;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); /* Ditingkatkan */
        }

        h1 {
            text-align: center;
            font-size: x-large;
            margin: 0 0 2% 0;
            color: white;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: .5rem;
                        color: white;
        }
        input[type="text"] {
            width: 100%;
            padding: .5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #007bff;
            padding: .5rem 1rem;
        }
        .btn-secondary {
            display: inline-block;
            color: #a5a5a5;
            text-decoration: none;
            font-size: 1rem;
            transition: background-color 0.2s ease;
        }

        .btn-secondary:hover {
            text-decoration: underline;
        }
        .error {
            background-color: #f8d7da;
            color: #842029;
            padding: .75rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
    </style>

    <div class="container">
        <h1>Tambah Task</h1>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="task">Nama Task</label>
                <input type="text" name="task" id="task" value="{{ old('task') }}" required>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center;">
                <a href="{{ route('tasks.index') }}" class="btn-secondary">← Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
