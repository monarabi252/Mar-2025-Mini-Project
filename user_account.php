<?php
require_once 'connect.php';
session_start();
$errors = [];
// Sign Up Logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$name = $_POST['name'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];
$created_at = date('Y-m-d H:i:s');
// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$errors['email'] = 'Invalid email format';
}
// Validate name
if (empty($name)) {
$errors['name'] = 'Name is required';
}
// Validate password length
if (strlen($password) < 8) {
$errors['password'] = 'Password must be at least 8 characters long';
}
// Check if passwords match
if ($password !== $confirmPassword) {
$errors['confirm_password'] = 'Passwords do not match';
}
// Check if email already exists
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$stmt->execute(['email' => $email]);
if ($stmt->fetch()) {
$errors['user_exist'] = 'Email is already registered';
}
// If there are errors, redirect back to the register page
if (!empty($errors)) {
$_SESSION['errors'] = $errors;
header('Location: register.php');
exit();
}
// Hash the password and save to the database
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
$stmt = $pdo->prepare("INSERT INTO users (email, password, name, created_at) VALUES (:email, :password, :name, :created_at)");
$stmt->execute([
'email' => $email,
'password' => $hashedPassword,
'name' => $name,
'created_at' => $created_at
]);
header('Location: index.php');
exit();
}
// Sign In Logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signin'])) {
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];
// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$errors['email'] = 'Invalid email format';
}
// Check if password is empty
if (empty($password)) {
$errors['password'] = 'Password cannot be empty';
}
// Redirect if there are errors
if (!empty($errors)) {
$_SESSION['errors'] = $errors;
header('Location: index.php');
exit();
}
// Fetch user details from the database
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$stmt->execute(['email' => $email]);
$user = $stmt->fetch();
// Validate user credentials
if ($user && password_verify($password, $user['password']))
{
$_SESSION['user'] = [
'id' => $user['id'],
'email' => $user['email'],
'name' => $user['name'],
'created_at' => $user['created_at']
];
header('Location: home.php');
exit();
} else {
$errors['login'] = 'Invalid email or password';
$_SESSION['errors'] = $errors;
header('Location: index.php');
exit();
}
}
?>
