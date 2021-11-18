<html>

<head>
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  <title>Verify</title>
</head>
<style>
  body {
    text-align: center;
    padding: 40px 0;
    background: #EBF0F5;
  }

  h1 {
    color: #88B04B;
    font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
    font-weight: 900;
    font-size: 40px;
    margin-bottom: 10px;
  }

  p {
    color: #404F5E;
    font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
    font-size: 20px;
    margin: 0;
  }

  i {
    color: #9ABC66;
    font-size: 100px;
    line-height: 200px;
    margin-left: -15px;
  }

  .card {
    background: white;
    padding: 60px;
    border-radius: 4px;
    box-shadow: 0 2px 3px #C8D0D8;
    display: inline-block;
    margin: 0 auto;
  }
  .button{
    padding: 10px 50px;
    background-color: skyblue;
    border: 1px solid black;
    border-radius: 10px;
    text-decoration: none;
    color:green;
  }
  .error{
    color: white;
    background-color: red;
  }
</style>

<body>
  @if($isSuccess == true)
  <div class="card">
    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
      <i class="checkmark">✓</i>
    </div>
    <h1>Success</h1>
    <p>Hi <b>{{ $fullName }}</b><br> 
    You have successfully created and confirmed an account on our Website With email "{{ $email }}"<br>
    Please click the button below to return to the current page<br>
    Wish you have a pleasant experience
    </p><br>
    <a href="http://localhost:3000/login" class="button"><b>Login</b></a>
  </div>
  @else
  <div class="card">
    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;color:red">
      <i style="color: red;"><b>✕</b></i>
    </div>
    <h1 style="color:red">Success</h1>
    <p>Sorry, This account has Confirm, expired,locked, or deleted<br>If you have any question, contact us for help</p><br>
    <a href="http://localhost:3000" class="button error"><b>Go back to Website</b></a>
    
  </div>
  @endif
</body>

</html>
