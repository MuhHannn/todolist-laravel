<x-app-layout>
    <style>
        body {
            font-family: sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 7% auto;
            background: #011638;
            color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); /* Ditingkatkan */
        }

        h2 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .detail-group {
            margin-bottom: 1rem;
        }

        .detail-group strong {
            display: inline-block;
            width: 120px;
            color: white;
        }

        .btn-secondary {
            display: inline-block;
            color: #a5a5a5;
            text-decoration: none;
            border-radius: 4px;
            font-size: 1rem;
            transition: background-color 0.2s ease;
        }

        .btn-secondary:hover {
            text-decoration: underline;
        }
    </style>

    <div class="container">
        <h2>Detail Task</h2>

        <div class="detail-group">
            <strong>Nama Task:</strong> {{ $task->task }}
        </div>

        <div class="detail-group">
            <strong>Status:</strong> {{ $task->is_completed ? 'Selesai' : 'Belum Selesai' }}
        </div>

        <div class="detail-group">
            <strong>Dibuat:</strong> {{ $task->created_at->format('d M Y, H:i') }}
        </div>

        <a href="{{ route('tasks.index') }}" class="btn-secondary">← Kembali</a>
    </div>
</x-app-layout>
