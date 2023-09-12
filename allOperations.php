<?php
// Replace these with your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// INSERT Operation
if (isset($_POST["insert"])) {
    $name = $_POST["name"];
    $description = $_POST["description"];

    $sql = "INSERT INTO items (name, description) VALUES ('$name', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// UPDATE Operation
if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $description = $_POST["description"];

    $sql = "UPDATE items SET name='$name', description='$description' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// SEARCH Operation
if (isset($_POST["search"])) {
    $searchTerm = $_POST["searchTerm"];

    $sql = "SELECT * FROM items WHERE name LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . "<br>";
            echo "Name: " . $row["name"] . "<br>";
            echo "Description: " . $row["description"] . "<br><hr>";
        }
    } else {
        echo "No records found.";
    }
}

// COUNT Operation
if (isset($_POST["count"])) {
    $sql = "SELECT COUNT(*) AS total FROM items";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Total Records: " . $row["total"];
    } else {
        echo "No records found.";
    }
}

// DELETE Operation
if (isset($_POST["delete"])) {
    $id = $_POST["id"];

    $sql = "DELETE FROM items WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD Example</title>
</head>
<body>
    <h1>PHP CRUD Example</h1>
    
    <!-- Insert Form -->
    <h2>Insert Record</h2>
    <form method="post">
        Name: <input type="text" name="name">
        Description: <input type="text" name="description">
        <input type="submit" name="insert" value="Insert">
    </form>
    
    <!-- Update Form -->
    <h2>Update Record</h2>
    <form method="post">
        ID: <input type="text" name="id">
        Name: <input type="text" name="name">
        Description: <input type="text" name="description">
        <input type="submit" name="update" value="Update">
    </form>
    
    <!-- Search Form -->
    <h2>Search Record</h2>
    <form method="post">
        Search Term: <input type="text" name="searchTerm">
        <input type="submit" name="search" value="Search">
    </form>
    
    <!-- Count Records -->
    <h2>Count Records</h2>
    <form method="post">
        <input type="submit" name="count" value="Count">
    </form>
    
    <!-- Delete Form -->
    <h2>Delete Record</h2>
    <form method="post">
        ID: <input type="text" name="id">
        <input type="submit" name="delete" value="Delete">
    </form>
</body>
</html>
