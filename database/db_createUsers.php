<?php

$db = new SQLite3(__DIR__ . '/database.sqlite');

$createTable = <<<SQL
CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL,
    password TEXT NOT NULL
);
SQL;

$result = $db->query($createTable);

if ($db->exec($createTable)) {
    echo "Table successfully created";
}else{

    echo "Error creating table: " . $db->lastErrorMsg();
}

$db->close();
?>
