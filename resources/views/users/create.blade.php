<form action="{{ route('users.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Nama" required>
    <input type="email" name="email" placeholder="Email" required>

    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password_confirmation" placeholder="Ulangi Password" required>

    <button type="submit">Create User</button>
</form>
