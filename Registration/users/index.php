<?php require_once '../app.php' ?>
<?php if(!$_SESSION['email']) redirect('index.php')?>
<h1>Welcome user</h1>
<a href="<?= URL."Auth/logout.php" ;?>">logout</a>