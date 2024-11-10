<?php

$db = new SQLite3(__DIR__ .'/database/database.sqlite');

$createTable = <<<SQL
CREATE TABLE IF NOT EXISTS products (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    description TEXT NOT NULL,
    price INTEGER NOT NULL
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





