<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo "Hello from PHP" ?></h1>

    <?php
    $servername = "mariadb";
    $username = "magento";
    $password = "magento";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        echo "Not connected " . $conn->connect_error;
    } else {
        echo "Connected successfully";
    }
    
?>

</body>
</html>