<?php
session_start();
if (!isset($_SESSION['user'])) {
header("Location: index.php");
exit();
}
require_once 'connect.php';
$user = $_SESSION['user'];
if (isset($_POST['delete'])) {
$email = $user['email'];
$stmt = $pdo->prepare("DELETE FROM users WHERE email = ?");
$stmt->execute([$email]);
// Log out the user after deletion
session_destroy();
header("Location: index.php");
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Account Details</title>
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
.user-info {
background-color: #e6e6fa;
padding: 15px;
border-radius: 10px;
margin-bottom: 15px;
border: 1px solid #6a5acd;
color: black;
text-align: left;
font-size: 1em;
line-height: 1.6;
}
.user-info p {
margin: 10px 0;
font-weight: bold;
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
.delete-btn {
background-color: #ff4d4d;
margin-top: 10px;
}
.delete-btn:hover {
background-color: #e60000;
}
</style>
</head>
<body>
<div class="container">
<h1 class="form-title">Account Details</h1>
<div class="user-info">
<p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
</div>
<button class="btn" onclick="location.href='home.php'">Back to Home</button>
<form method="post">
<button type="submit" name="delete" class="btn delete-btn">Delete Account</button>
</form>
</div>
</body>
</html>
