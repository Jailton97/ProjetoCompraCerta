<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="css/styleLogin.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
    <title>Login Page</title>
</head>
<body>

<div class="wrapper fadeInDown">
  <div id="formContent">

    <!-- Login Form -->
    <form action="logarFuncionario" method="post" name="loginForm">
      <div>
        <img src="assets/img/logo/testelogo.png" width="100px" height="50px" style="margin: 15px 0px 15px 0px">
      </div>
      <br>
      <input type="number" id="cpf" class="fadeIn second" name="cpf" placeholder="cpf">
      <br><br><br>
      <input type="submit" class="fadeIn fourth" value="Entrar">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      
    </div>

  </div>
</div>
</body>
</html>



