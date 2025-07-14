<?php
// Connection to MySQL
require_once 'connect.php';
session_start();
$errors = [];
// Check if a file has been uploaded
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
$fileName = $_FILES['file']['name']; // Get the file name
$fileTmpName = $_FILES['file']['tmp_name']; // Temporary file name
$fileType = $_FILES['file']['type']; // Get the file type
//$fileContent = file_get_contents($fileTmpName); // Get the file content
if (empty($fileName)) {
$errors['fileName'] = 'FileName cannot be empty';
}
if (empty($fileType)) {
$errors['fileType'] = 'FileType cannot be empty';
}
if (!empty($errors)) {
$_SESSION['errors'] = $errors;
header('Location: index.php');
exit();
}
// Define the directory where files will be uploaded
$uploadDirectory = "uploads/"; // Make sure this folder exists
// Move the uploaded file to the desired folder
$destination = $uploadDirectory . basename($fileName);
if (move_uploaded_file($fileTmpName, $destination)) {
// Prepare SQL statement to store file path
$sql = "INSERT INTO documents (file_name, file_type, file_path) VALUES (?,?,?)";
// Prepare the statement
$stmt = $pdo->prepare($sql);
// Execute the statement
$stmt->execute([$fileName, $fileType, $destination]);
} else {
echo "Error uploading the file.";
}
header('Location: home.php');
exit();
}
?>
