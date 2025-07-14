<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document Upload</title>
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
display: flex;
align-items: center;
background-color: #f3e8ff; /* Very Light Lavender */
padding: 20px;
border-radius: 15px;
box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
border: 2px solid #6a5acd; /* Lighter Indigo */
max-width: 850px;
margin-top: 20px;
}
.image-section {
flex: 1;
text-align: center;
margin-right: 20px;
}
.image-section img {
width: 250px;
height: auto;
border-radius: 10px;
box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
border: 2px solid #6a5acd;
}
.form-section {
flex: 1;
background-color: #e6e6fa; /* Lavender */
padding: 20px;
border-radius: 15px;
box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
border: 2px solid #6a5acd; /* Lighter Indigo */
}
h2 {
margin-bottom: 15px;
color: #6a5acd;
font-weight: bold;
text-align: center;
}
label {
display: block;
margin-bottom: 10px;
font-weight: bold;
}
input[type="file"] {
width: 100%;
padding: 8px;
margin-bottom: 15px;
border-radius: 10px;
border: 1px solid #6a5acd;
background-color: #f3e8ff;
color: black;
}
input[type="submit"] {
background-color: #6a5acd;
color: white;
padding: 10px 20px;
border: none;
border-radius: 10px;
cursor: pointer;
font-weight: bold;
transition: background-color 0.3s;
width: 100%;
margin-bottom: 15px;
}
input[type="submit"]:hover {
background-color: #8a2be2; /* Slightly darker lavender */
}
.nav-buttons {
text-align: center;
margin-top: 20px;
}
.nav-buttons a {
text-decoration: none;
background-color: #dcd6f7; /* Light Lavender */
color: black;
padding: 10px 20px;
border-radius: 10px;
margin: 5px;
border: 2px solid #6a5acd;
font-weight: bold;
transition: background-color 0.3s, color 0.3s;
}
.nav-buttons a:hover {
background-color: #6a5acd;
color: white;
}
</style>
</head>
<body>
<div class="container">
<!-- Image Section (Left) -->
<div class="image-section">
<img src="https://www.creativefabrica.com/wp-content/uploads/2021/04/10/Arrows-database-icon-Graphics-10637384-1.jpg"
alt="Upload Graphic">
</div>
<!-- Form Section (Right) -->
<div class="form-section">
<h2>Upload Document</h2>
<form action="upload.php" method="POST" enctype="multipart/form-data">
<label for="file">Select Document:</label>
<input type="file" name="file" id="file" required>
<input type="submit" value="Upload">
</form>
<!-- Navigation Buttons -->
<div class="nav-buttons">
<a href="home.php">🏠 Home</a> <!-- Adjusted link to the Home Page -->
<a href="browse.php">📚 Browse</a>
</div>
</div>
</div>
</body>
</html>
