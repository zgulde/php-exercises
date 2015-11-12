<?php
    $things = ['coffee','my son','coding','playing guitar'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Favorite Things</title>
    <style>
        ul{
            list-style-type: none;
        }
        td:nth-child(odd){
            background: rgba(0,0,0,0.1);
            border-left: 1px solid black;
            border-right: 1px solid black;
        }
        td{
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <h1>My Favorite Things</h1>
    <table>
        <tr>
    <?php foreach($things as $thing): ?>
        <td><?= $thing; ?></td>
    <?php endforeach ?>
        </tr>
    </table>
</body>
</html>