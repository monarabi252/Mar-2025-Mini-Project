<?php
session_start();
if (!isset($_SESSION['user'])) {
header("Location: index.php");
exit();
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>College Marketplace</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
body {
font-family: Arial, sans-serif;
margin: 0;
background-color: #dcd6f7;
display: flex;
flex-direction: column;
align-items: center;
min-height: 100vh;
position: relative;
color: black;
}
.navbar {
width: 100%;
background-color: #6a5acd;
padding: 10px 0;
display: flex;
justify-content: center;
box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
margin-bottom: 20px;
}
.navbar button {
background-color: #e6e6fa;
color: black;
padding: 10px 20px;
margin: 0 20px;
border: 2px solid #6a5acd;
border-radius: 10px;
cursor: pointer;
font-weight: bold;
transition: background-color 0.3s, color 0.3s;
}
.navbar button:hover {
background-color: #6a5acd;
color: white;
}
.main-container {
display: flex;
justify-content: center;
align-items: center;
position: relative;
width: 90%;
max-width: 1200px;
min-height: 500px;
margin-bottom: 50px;
}
.main-content {
flex-grow: 1;
text-align: center;
background-color: #f3e8ff;
padding: 20px;
border-radius: 10px;
box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
margin-right: 20px;
color: black;
}
.recommended-books {
width: 300px;
background-color: #dcd6f7;
padding: 15px;
border-radius: 10px;
box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
border: 2px solid #6a5acd;
overflow-y: auto;
height: fit-content;
margin-left: 20px;
color: black;
}
.recommended-books h2 {
margin-bottom: 10px;
text-align: center;
color: #6a5acd;
}
.recommended-books ul {
list-style-type: none;
padding: 0;
margin: 0;
}
.recommended-books li {
margin-bottom: 10px;
padding: 8px;
background-color: #f3e8ff;
border-radius: 8px;
box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
border-bottom: 1px solid #6a5acd;
font-size: 0.9rem;
color: black;
}
footer {
width: 100%;
background-color: #6a5acd;
color: white;
padding: 10px;
text-align: center;
position: absolute;
bottom: 0;
display: flex;
justify-content: space-between;
align-items: center;
box-sizing: border-box;
padding: 10px 20px;
}
.logout-button {
background-color: #e6e6fa;
color: black;
border: 2px solid #6a5acd;
border-radius: 10px;
padding: 5px 15px;
cursor: pointer;
font-weight: bold;
text-decoration: none;
transition: background-color 0.3s, color 0.3s;
}
.logout-button:hover {
background-color: #6a5acd;
color: white;
}
a {
color: #6a5acd;
text-decoration: none;
font-weight: bold;
}
a:hover {
color: #8a2be2;
text-decoration: underline;
}
</style>
</head>
<body>
<!-- Navigation Links as Buttons -->
<nav class="navbar">
<button onclick="location.href='index.php'">Home</button>
<button onclick="location.href='upload1.php'">Upload Document</button>
<button onclick="location.href='browse.php'">Browse</button>
<button onclick="location.href='account.php'">Account</button> <!-- New Account Button -->
</nav>
<!-- Main Content and Recommended Books -->
<div class="main-container">
<div class="main-content">
<h1>College Marketplace</h1>
<h2>Welcome!</h2>
<p>View books, notes, and study materials within your college here!</p>
<img src="https://media.tenor.com/W101Fmymi9IAAAAM/books-libros.gif" alt="Books Animation" width="300" />
</div>
<aside class="recommended-books">
<h2>Recommended Books:</h2>
<ul>
<?php
require_once 'connect.php';
$sql = "SELECT id, title, author, description FROM books";
$result = $pdo->query($sql);
if ($result->rowCount() > 0) {
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
echo "<li><strong>Title:</strong> " . htmlspecialchars($row['title']) . "<br>";
echo "<strong>Author:</strong> " . htmlspecialchars($row['author']) . "<br>";
echo "<strong>Description:</strong> " . htmlspecialchars($row['description']) . "</li><hr>";
}
} else {
echo "<li>No books found.</li>";
}
?>
</ul>
</aside>
</div>
<!-- Footer -->
<footer>
<p>Logged in as: <?php echo htmlspecialchars($user['name']); ?> | Email: <?php echo htmlspecialchars($user['email']); ?></p>
<a href="logout.php" class="logout-button">Logout</a>
<p>&copy; 2025 College Marketplace</p>
</footer>
</body>
</html>
