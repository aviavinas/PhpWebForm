<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Entry Form</title>
    <style>
        * {
          font-family: arial, sans-serif;
        }
        table {
          border-collapse: collapse;
          width: 100%;
        }
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        tr:nth-child(even) {
          background-color: #dddddd;
        }
    </style>
</head>
<body>
<form method="post" action="/">
    <h2>Enter Data</h2>
    <fieldset>
        <label>First Name : </label>
        <input type="text" name="first_name" maxlength="30" required />
    </fieldset>
    <fieldset>
        <label>Last Name : </label>
        <input type="text" name="last_name" maxlength="30" required />
    </fieldset>
    <fieldset>
        <label>First Name : </label>
        <input type="email" name="email" maxlength="50" required />
    </fieldset><br>
    <button type="submit" name="submit" value="submit">Submit</button>
</form>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])) {
    $sql = "INSERT INTO user (first_name, last_name, email) VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['email']."')";
    if ($conn->query($sql) === TRUE) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

echo "<br><br><h2>All Users</h2>
<table>
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
  </tr>";
$sql = "SELECT * FROM user ORDER BY first_name DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["email"]."</td></tr>";
    }
} else {
    echo "<tr><td>0 results</td></tr>";
}

echo "</table>";
$conn->close();

?>

<table>
<tr>
</table>