
<?php

use App\Entity\Users;
use App\Entity\Message;
require_once '../vendor/autoload.php';

// envoyer les donées
if(empty($_POST['user']) or empty($_POST['message'])) {
    return "erreur" ;
}else{
    $user = new Users(); // object
    $message = new Message();
    $user->setName($_POST['user']);

    $userName = $user->getName();
    
    
    $message->setContent($_POST['message']);
    $message->setAuthor($userName);
    $messageContent = $message->getContent();
    

    $connection = new mysqli('localhost', 'maha', 'root', 'chat');
    $statement = $connection->prepare("INSERT INTO messages (message, author, date) VALUES (?, ?, NOW())");
    $statement->bind_param("ss", $messageContent, $userName);
    $statement->execute();
    $statement->close();
}


//obtenirlesMessage

// récupérer les données
$connection = new mysqli('localhost', 'maha', 'root', 'chat');
$sql = "SELECT * FROM messages ORDER BY date DESC";
$result = $connection->query($sql);

$messages = [];
foreach($result as $message) {
    $messages[] = (new Message())
                    ->setContent($message['message'])
                    ->setAuthor($message['author']);
}
$result->free();
$connection->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Mon super Chat</title>
</head>
<body>
    <div class="container">
        <div class="col-md-4">
        <h1>Bienvenu dans mon chat</h1>
        <div class="form-group">
    <form action="" method="post">
        <textarea  name="message" cols="30" rows="10" placeholder="Your message"></textarea>
        <input  type="text" name="user" placeholder="Your name">
        <button type="submit" class="btn btn-primary">Send</button>
    </form>

    <div class="col-md-6">
        <h1> Tous les messages</h1>
        <div class="form-group">
            <?php foreach($messages as $message) : ?>
          <?= $message->getAuthor() ?> : <?= $message->getContent() ?> <br>
            <?php endforeach ?>
        </div>
    </div>

        </div>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
