<?php
session_start();
if (isset($_SESSION['errors'])) {
$errors = $_SESSION['errors'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
body {
font-family: Arial, sans-serif;
margin: 0;
background-color: #dcd6f7;
display: flex;
justify-content: center;
align-items: center;
min-height: 100vh;
color: black;
}
.container {
background-color: #f3e8ff;
padding: 30px;
border-radius: 15px;
box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
width: 350px;
text-align: center;
border: 2px solid #6a5acd;
}
.form-title {
font-size: 1.8em;
margin-bottom: 20px;
color: #6a5acd;
font-weight: bold;
}
.input-group {
margin-bottom: 15px;
display: flex;
align-items: center;
background-color: #e6e6fa;
padding: 10px;
border-radius: 10px;
border: 1px solid #6a5acd;
}
.input-group i {
margin-right: 10px;
color: #6a5acd;
}
input {
border: none;
outline: none;
background-color: transparent;
width: 100%;
padding: 5px;
color: black;
}
.btn {
background-color: #6a5acd;
color: white;
border: none;
padding: 10px;
width: 100%;
border-radius: 10px;
cursor: pointer;
font-weight: bold;
margin-top: 10px;
transition: background-color 0.3s;
}
.btn:hover {
background-color: #8a2be2;
}
.error {
color: #b22222;
margin-top: 5px;
font-size: 0.9em;
text-align: left;
}
p {
margin-top: 15px;
font-weight: bold;
color: black;
}
a {
color: #6a5acd;
text-decoration: none;
font-weight: bold;
display: block;
margin-top: 10px;
}
a:hover {
color: #8a2be2;
text-decoration: underline;
}
</style>
</head>
<body>
<div class="container">
<h1 class="form-title">Register</h1>
<form method="POST" action="user-account.php">
<div class="input-group">
<i class="fas fa-user"></i>
<input type="text" name="name" placeholder="Name" required>
</div>
<div class="input-group">
<i class="fas fa-envelope"></i>
<input type="email" name="email" placeholder="Email" required>
</div>
<div class="input-group">
<i class="fas fa-lock"></i>
<input type="password" name="password" placeholder="Password" required>
</div>
<div class="input-group">
<i class="fas fa-lock"></i>
<input type="password" name="confirm_password" placeholder="Confirm Password" required>
</div>
<input type="submit" class="btn" value="Sign Up" name="signup">
</form>
<p>Already have an account?</p>
<a href="index.php">Sign In</a>
</div>
</body>
</html>
<?php
if (isset($_SESSION['errors'])) {
unset($_SESSION['errors']);
}
?>
