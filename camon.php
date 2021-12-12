<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .chucamon {
        font-size: 200px;
        font-family: courier, arial, helvetica;
        padding-top: 100px;
        color: #98b306;
        font-weight: bold;
    }

    @import url(https://fonts.googleapis.com/css?family=BenchNine:700);

    .snip1582 {
        background-color: #c47135;
        border: none;
        color: #ffffff;
        cursor: pointer;
        display: inline-block;
        font-family: 'BenchNine', Arial, sans-serif;
        font-size: 1em;
        font-size: 22px;
        line-height: 1em;
        margin: 15px 40px;
        outline: none;
        padding: 12px 40px 10px;
        position: relative;
        text-transform: uppercase;
        font-weight: 700;

    }

    .snip1582:before,
    .snip1582:after {
        border-color: transparent;
        -webkit-transition: all 0.25s;
        transition: all 0.25s;
        border-style: solid;
        border-width: 0;
        content: "";
        height: 24px;
        position: absolute;
        width: 24px;
    }

    .snip1582:before {
        border-color: #c47135;
        border-top-width: 2px;
        left: 0px;
        top: -5px;
    }

    .snip1582:after {
        border-bottom-width: 2px;
        border-color: #c47135;
        bottom: -5px;
        right: 0px;
    }

    .snip1582:hover,
    .snip1582.hover {
        background-color: #c47135;
    }

    .snip1582:hover:before,
    .snip1582.hover:before,
    .snip1582:hover:after,
    .snip1582.hover:after {
        height: 100%;
        width: 100%;
    }

    body {
        background-image: url('https://img.timviec.com.vn/2019/09/ban-hang-la-gi-nhung-dieu-ban-nen-biet-ve-nghe-sieu-hot-nay-1.jpg');
        background-size: cover;
    }
</style>

<body>
    <div class="text-center" style="padding: 50px 50px; padding-top: 20px;
padding-bottom: 20px; text-align: center;">
        <marquee class="chucamon" align="center" direction="left" scrollamount="50" width="100%">
            Cảm ơn vì đã mua hàng

        </marquee>

        <div class="form-group col-md-12 text-center" style="padding-top: 50px;">
            <a style="text-decoration: none;" class="snip1582" style="text-align: center;" href="index.php">Quay lại trang mua hàng</a>
        </div>
    </div>


</body>

</html>