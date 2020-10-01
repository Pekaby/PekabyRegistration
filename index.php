<?
//This is example form page!


require 'autoload.php';
//csrf_get_token(); // write it only if $csrfprotection is true!
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="autoload.php" name="p-direct">
        <?
//csrf_field() // write it only if $csrfprotection is true!
        ?>
        <input type="email" name="p-direct[email]"><br><br>
        <!-- add 'hash.', to hash string! -->
        <input type="password" name="p-direct[hash.password]"><br><br>
        <input type="text" name="p-direct[name]"><br><br>
        <button type="submit">Submit data!</button>
    </form>
</body>
</html>