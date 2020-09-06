<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = 'mashacat';
    $DATABASE_NAME = 'phpcrud';
    try {
        return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $e) {
        //throw $th;
        exit('Failed to connect to database!');
    }
}

function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <html>
            <head>
            <title>$title</title>
            <link href="style.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
            </head>
        <body>
        <nav class="navtop">
            <div>
                <h1>Website Title</h1>
                <a href="index.php"><i class="fas fa-home">Home</i>
                <a href="read.php"><i class="fas fa-address-book">Contacts</i></a></a>
            </div>
        </nav>
    EOT;
}

function template_footer() {
    echo <<<EOT
        </body>
    </html>
    EOT;
}
?>