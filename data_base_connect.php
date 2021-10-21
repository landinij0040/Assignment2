<?php
function connect_to_db()
{
    $host = "cssrvlab01.utep.edu";
    $db = "ijlandin_f21_db";
    $username = "ijlandin";
    $password = "*utep2021!";

    $conn = new mysqli($host, $username, $password, $db);

    $GLOBALS['conn'] = $conn;

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
connect_to_db();
