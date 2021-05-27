<?php
    require_once __DIR__ . '/database.php';

    $room_id = $_GET['id'];

    // Query per il database 
    $sql = "SELECT * FROM `stanze` WHERE `id` = " . $room_id . ";";
    $result = $conn->query($sql);

    $room = [];
    if ($result && $result->num_rows > 0) {
        $room = $result->fetch_assoc();
    }

    // var_dump($room);

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettagli stanza</title>
</head>
<body>
    
    <h1>Dettagli stanza <?php echo $room['room_number']; ?></h1>

    <ul>
        <li>Piano: <?php echo $room['floor']?></li>
        <li>Letti: <?php echo $room['beds']?></li>
    </ul>
</body>
</html>