<?php
$servername = "localhost"; // Replace with your server name
$username = "usermane"; // Replace with your database username
$password = "password"; // Replace with your database password
$dbname = "database"; // Replace with your database name
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM form"; // Change 'form' to your actual table name
$result = $conn->query($sql);
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Results</title>
     <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Results</h1>
    </div>
    <div class="lg:w-2/3 w-full mx-auto overflow-auto">
    <?php if ($result && $result->num_rows > 0): ?>
      <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Name</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Email</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Message</th>
          </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                            <td class="border-t-2 border-gray-200 px-4 py-3"><?php echo $row['name']; ?></td>
            <td class="border-t-2 border-gray-200 px-4 py-3"><?php echo $row['email']; ?></td>
            <td class="border-t-2 border-gray-200 px-4 py-3"><?php echo $row['message']; ?></td>
                            </tr>
                        <?php endwhile; ?>
        </tbody>
      </table>
      <?php else: ?>
                    <p>No results found</p>
                <?php endif; ?>
    </div>
  </div>
</section>
</body>
</html>
