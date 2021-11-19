<h1> Register form </h1>

<form action="" method="post">


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

    <div>
    <label>Email:</label>
        <input type="email" name="email" placeholder="email" >
    </div>

    <div>
    <label>phone:</label>
    <input type="text" name="phone" placeholder="phone" >
    </div>




    <input type="submit" name="submit"  >

</form>
