<?php
// Establish the connection
$connect = mysqli_connect(
    'db',           // service name
    'php_docker',   // username
    'password',     // password
    'php_docker'    // database name
);


$table_name = "php_docker_table1";
$query = "SELECT * FROM $table_name";
$response = mysqli_query($connect, $query);

echo "<strong>$table_name: </strong>";
while($i = mysqli_fetch_assoc($response)) {
    echo "<p>".$i['title1']."</p>";
    echo "<p>".$i['body1']."</p>";
    echo "<p>".$i['date_created1']."</p>";
    echo "<hr>";
}
