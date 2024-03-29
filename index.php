<?php
    require_once __DIR__ . '/database.php';

    // Query per il database 
    $sql = "SELECT * FROM `stanze`;";
    $result = $conn->query($sql);

    // popoliamo un array, attraverso un ciclo, con il risultato della query 
    $rooms = [];
    if ($result && $result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $rooms[] = $row;
        }
    }
    
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stanze</title>
</head>
<body>
    
    <h1>Lista Stanze</h1>

    <ul>
        <?php foreach($rooms as $room) {?>
        <li>
            Numero stanza: <?php echo $room['room_number'];?><br>
            Piano: <?php echo $room['floor'];?>
            <div><a href="room_info.php?id=<?php echo $room['id'];?>">Dettagli stanza</a></div>
        </li>
        <?php } ?>
    </ul>
</body>
</html>