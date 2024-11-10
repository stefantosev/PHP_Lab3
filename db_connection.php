<?php
function database_connect(): SQLite3{
    return new SQLite3(__DIR__ .'/database/database.sqlite');
}
?>
