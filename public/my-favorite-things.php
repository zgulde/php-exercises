<?php
    $things = ['coffee','my son','coding','playing guitar'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Favorite Things</title>
</head>
<body>
    <h1>My Favorite Things</h1>
    <ul>
    <?php foreach ($things as $thing) { ?>
        <li><?php echo $thing; ?></li>
    <?php } ?>
    </ul>
</body>
</html>