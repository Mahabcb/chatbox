<?php
$connection = new mysqli('localhost', 'root', 'root'); // ma connexion à MYSQL
$sql = "CREATE DATABASE IF NOT EXISTS chat"
; // j'execute la requete

if($connection->query($sql) === TRUE) { // on verifie que la connexion a bien été établie
    echo "La base de données a bien été créée". PHP_EOL;
} else { // sinon j'affiche l'erreur
    echo $connection->error;
}
// if(condition) { j'execute le code } else { j'execute un autre code d'erreur}

// création des tables

// table messages
$sql1 = "CREATE TABLE IF NOT EXISTS chat.messages (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    message text,
    date DATETIME NOT NULL
    )";

// table users
$sql = "CREATE TABLE IF NOT EXISTS chat.users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    auteur VARCHAR(30) NOT NULL,
    name VARCHAR(30) NOT NULL
    )";

if($connection->query($sql1) === TRUE) { // on verifie que la connexion a bien été établie
    echo "La table a bien été créée ". PHP_EOL;
} else { // sinon j'affiche l'erreur
    echo $connection->error;
}

if($connection->query($sql) === TRUE) { // on verifie que la connexion a bien été établie
    echo "La table a bien été créée". PHP_EOL;
} else { // sinon j'affiche l'erreur
    echo $connection->error;
}
