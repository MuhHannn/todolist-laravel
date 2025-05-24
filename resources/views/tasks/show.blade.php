<x-app-layout>
    <style>
        /* Gunakan kembali style dari create.blade.php */
        .detail-group {
            margin-bottom: 1rem;
        }
        .detail-group strong {
            display: inline-block;
            width: 120px;
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

        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</x-app-layout>
