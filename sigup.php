<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/signin.css">
</head>
<body class="text-center">
    <main class="form-signin">
    <form action="sigupv0.php" method="post">
    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
    <div class="form-floating">
    <input type="email" class="form-control" name="email"><br>
    <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
    <input type="text"  class="form-control" name="username"><br>
    <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
    <input type="password" class="form-control" name="password"><br>
    <label for="floatingInput">Password</label>
    </div>
    <input type="submit"  class="w-100 btn btn-lg btn-primary" value="Sing Up">
    </form>
</body>
</html>