<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $Username = $_POST["Username"];
    $Suggestions = $_POST["Suggestions"];
    $Rate = $_POST["Rate"];

    $conn = new mysqli('localhost', 'root', '', 'Alpha');      /* Alpha : Name of the database */
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO test2 (Username, Suggestions, Rate) VALUES (?, ?, ?)");     /* test2 : Na,e of the table */
        $stmt->bind_param("sss", $Username, $Suggestions, $Rate);
        $execval = $stmt->execute();
        if ($execval === FALSE) {
            echo "<script>alert('Error:  . $stmt->error') </script>";
        } else {
            echo "<script>alert('Registration successful...')</script>";
        }
        $stmt->close();
        $conn->close();
    }
}
?>

