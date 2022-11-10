<?php
require_once("config.php");

if(isset($_POST['login'])){

 //   $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
   // $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
  $username = $_POST['username'];
  $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
	//echo $password." |".$user["password"]; exit();
    // jika user terdaftar
    if($user){
        // verifikasi password
        //if(password_verify($password, $user["password"])){
         if($password == $user["password"]){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: index.html");
	    exit();
        }
	else{
    	   echo "password salah";
	   exit();
        }
    }
    else{
	echo "user tidak ditemukan ";
	exit();
      }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.signup {
  width : auto;
  padding: 10px 18px;
  nackground-color: #008000;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.password {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.password {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }

.signup {
    width: 100%;
}
}
</style>
</head>
<body>

<h2>Login Form</h2>

<form name="login"  action="/login.php" method="post">

  <div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
	<input type="hidden" name="login" />
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <a href="index.html"><button type="button" class="cancelbtn">Cancel</button>
    <a href="register.php"><button type="button" class="signup">Sign Up</button>
</div>
</form>

</body>
</html>

