<?php
// Establish connection to your MySQL database
$servername = "localhost"; // Replace with your server name
$username = "usermane"; // Replace with your database username
$password = "password"; // Replace with your database password
$dbname = "database"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email']; // Add 'email' input field in your form
$message = $_POST['message'];

// Prepare and execute SQL statement to insert data into your table
$sql = "INSERT INTO form (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    $successMessage = "Email sent successfully. Click on the button to go back.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>


<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
    <?php if (isset($successMessage)): ?>
      <div class="lg:w-2/3 flex flex-col sm:flex-row sm:items-center items-start mx-auto">
        <h1 class="flex-grow sm:pr-16 text-2xl font-medium title-font text-gray-900">Email send successfully. Click on the button to go back.</h1>
                    <a href="index.html"> <button class="flex-shrink-0 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-10 sm:mt-0">Go Back</button></a>
        <?php endif; ?>
    </div>
      
    </div>
  </section>


  
</body>
</html>
