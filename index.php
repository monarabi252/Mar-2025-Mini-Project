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
<title>Sign In</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
body {
font-family: Arial, sans-serif;
margin: 0;
background-color: #dcd6f7; /* Light Lavender */
display: flex;
justify-content: center;
align-items: center;
min-height: 100vh;
color: black;
}
.container {
background-color: #f3e8ff; /* Very Light Lavender */
padding: 30px;
border-radius: 15px;
box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
width: 350px;
text-align: center;
border: 2px solid #6a5acd; /* Lighter Indigo */
}
.form-title {
font-size: 1.8em;
margin-bottom: 20px;
color: #6a5acd; /* Lighter Indigo */
font-weight: bold;
}
.input-group {
margin-bottom: 15px;
display: flex;
align-items: center;
background-color: #e6e6fa; /* Lavender */
padding: 10px;
border-radius: 10px;
border: 1px solid #6a5acd; /* Lighter Indigo */
}
.input-group i {
margin-right: 10px;
color: #6a5acd;
}
input {
border: none;
outline: none;
background-color: transparent;
font-size: 1em;
width: 100%;
color: black;
padding: 5px;
}
input::placeholder {
color: #6a5acd;
}
.btn {
background-color: #6a5acd; /* Lighter Indigo */
color: white;
border: none;
padding: 10px;
width: 100%;
border-radius: 10px;
cursor: pointer;
font-weight: bold;
transition: background-color 0.3s;
margin-top: 10px;
}
.btn:hover {
background-color: #8a2be2; /* Slightly Darker Lavender */
}
.error-main {
background-color: #b22222; /* Firebrick Red for error */
padding: 10px;
margin-bottom: 15px;
border-radius: 10px;
color: white;
font-weight: bold;
}
.error {
color: #b22222;
margin-top: 5px;
font-size: 0.9em;
text-align: left;
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
p {
margin-top: 15px;
font-weight: bold;
color: black;
}
</style>
</head>
<body>
<div class="container" id="signIn">
<h1 class="form-title">Sign In</h1>
<?php
if (isset($errors['login'])) {
echo '<div class="error-main">' . htmlspecialchars($errors['login']) . '</div>';
unset($errors['login']);
}
?>
<form method="POST" action="user-account.php">
<!-- Email Field -->
<div class="input-group">
<i class="fas fa-envelope"></i>
<input type="email" name="email" id="email" placeholder="Email" required>
</div>
<?php
if (isset($errors['email'])) {
echo '<div class="error">' . htmlspecialchars($errors['email']) . '</div>';
}
?>
<!-- Password Field -->
<div class="input-group">
<i class="fas fa-lock"></i>
<input type="password" name="password" id="password" placeholder="Password" required>
</div>
<?php
if (isset($errors['password'])) {
echo '<div class="error">' . htmlspecialchars($errors['password']) . '</div>';
}
?>
<input type="submit" class="btn" value="Sign In" name="signin">
</form>
<p>Don't have an account yet?</p>
<a href="register.php">Sign Up</a>
</div>
</body>
</html>
<?php
if (isset($_SESSION['errors'])) {
unset($_SESSION['errors']);
}
?>
