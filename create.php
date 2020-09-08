<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record 
    // Set-up the variables that are going to be inserted, we must check if the POST vaiables exist if not will be default to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $department = isset($_POST['department']) ? $_POST['department'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
    // Insert new record into the contacts table 
    $stmt = $pdo->prepare('INSERT INTO contacts VALUES (?,?,?,?,?,?,?,?)');
    $stmt->execute([$id, $department, $name, $lastname, $email, $phone, $title, $created]);
    // Output message
    $msg = 'Created Successfully!';
}
?>

<?= template_header('Create') ?>

<div class="content update">
    <h2>Create Contact</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="deparment">Deparment</label>
        <input type="text" name="id" placeholder="26" value="auto" id="id">
        <input type="text" name="department" placeholder="IT" id="department">
        <label for="name">Name</label>
        <label for="lastname">Lastname</label>
        <input type="text" name="name" placeholder="John" id="name">
        <input type="text" name="lastname" placeholder="Doe" id="lastname">
        <label for="email">Email</label>
        <label for="phone">Phone</label>
        <input type="text" name="email" placeholder="johndoe@example.com" id="email">
        <input type="text" name="phone" placeholder="2025550143" id="phone">
        <label for="title">Title</label>
        <label for="created">Created</label>
        <input type="text" name="title" placeholder="Employee" id="title">
        <input type="datetime-local" name="creaed" value="<?= date('Y-m-d\TH:i') ?>" id="created">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg) : ?>
    <p><?= $msg ?></p>
    <?php endif; ?>
</div>

<?= template_footer() ?>