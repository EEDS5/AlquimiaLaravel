<form action="{{ route('login') }}" method="post">
    @csrf

    <input type="email" name="email" placeholder="Email">
    <input type="password" name="passwordSalt" placeholder="Password Salt">

    <button type="submit">Login</button>
</form>