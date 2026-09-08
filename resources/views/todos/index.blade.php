<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Catatan</title>
</head>
<body>
    <h1>Daftar Catatan</h1>

    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Tulis catatan baru..." required>
        <button type="submit">Tambah</button>
    </form>

    <ul>
        @foreach ($todos as $todo)
            <li style="text-decoration: {{ $todo->is_done ? 'line-through' : 'none' }}">
                {{ $todo->title }}

                <form action="{{ route('todos.update', $todo) }}" method="POST" style="display:inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit">{{ $todo->is_done ? 'Batal' : 'Selesai' }}</button>
                </form>

                <form action="{{ route('todos.destroy', $todo) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>