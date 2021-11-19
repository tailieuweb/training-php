<h1> Login form </h1>

<form action="api/login" method="post">

    @csrf
    @if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif

    <div>
        <label> Username: </label>
        <input type="text" name="Username" placeholder="username" >
    </div>

    <div>
        <label> Passsword: </label>
        <input type="password" name="password" placeholder="password" >
    </div>

    <input type="submit" name="submit"  >

</form>
