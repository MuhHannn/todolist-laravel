<x-app-layout>
    <style>
        body {
        }

        h1 {
            text-align: center;
            font-size: x-large;
            margin: 0 0 1% 0;
        }

        .box {
            background-color: #011638;
            margin: 2%;
            padding: 2%;
            color: white;
            border-radius: 10px;
        }

        .success-message {
            background-color: #d4edda;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .tasks {
            display: flex;
            gap: 2%;
        }

        .box-undone{
            width: 55%;
        }

        .box-done{
            width: 45%
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .actions div {
            display: flex;
        }

        .actions button,
        .actions a {
            padding: 5px 10px;
            margin-right: 5px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 13px;
            text-decoration: none;
            color: white;
            display: inline-block;
        }

        .btn-create {
            background-color: #007bff;
            padding: 5px 10px;
            margin-right: 5px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 13px;
            text-decoration: none;
            color: white;
            display: inline-block;
        }

        .btn-complete {
            background-color: #007bff
        }

        .btn-show {
            background-color: #28a745;
        }

        .btn-edit {
            background-color: #ffc107;
            color: black;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-add {
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 7px 15px;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 15px;
        }
    </style>

    <div class="container">
        <div class="box">
            <h1>Todolist</h1>

            <a href="{{ route('tasks.create') }}" class="btn-create" style="margin-bottom: 20px; display:inline-block;">Tambah Task</a>


            <div class="tasks">
                <div>
                    <h4 class="box-undone">Belum Selesai</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Task</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks->where('is_completed', false) as $index => $task)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $task->task }}</td>
                                    <td class="actions">
                                        <div>
                                            <!-- Tombol tandai selesai -->
                                            <form action="{{ route('tasks.update', $task->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="task" value="{{ $task->task }}">
                                                <input type="hidden" name="is_completed" value="1">
                                                <button class="btn-complete" type="submit">Selesai</button>
                                            </form>

                                            <!-- Tombol edit -->
                                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn-edit">Edit</a>
                                            
                                            <!-- Tombol edit -->
                                            <a href="{{ route('tasks.show', $task->id) }}" class="btn-show">Show</a>

                                            <!-- Tombol hapus -->
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-delete" type="submit">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Tidak ada task belum selesai.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="box-done">
                    <h4>Sudah Selesai</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Task</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks->where('is_completed', true) as $index => $task)
                                <tr>
                                    <td>{{ $loop->iteration  }}</td>
                                    <td>{{ $task->task }}</td>
                                    <td class="actions">
                                        <div>
                                            <!-- Tombol tandai belum selesai (ulang) -->
                                            <form action="{{ route('tasks.update', $task->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="task" value="{{ $task->task }}">
                                                <input type="hidden" name="is_completed" value="0">
                                                <button class="btn-secondary" type="submit">Ulangi</button>
                                            </form>

                                            <!-- Tombol hapus -->
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-delete" type="submit">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Tidak ada task selesai.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Sweet Alert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                                showCloseButton: true,       // Menampilkan tombol X
                    timer: 2000
                });
            </script>
        @endif
    </div>
</x-app-layout>
