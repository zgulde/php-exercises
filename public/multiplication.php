<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multiplication Tables</title>
    <style>
        td{
            padding: 5px 10px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-collapse: collapse;
        }
        td:nth-child(even){
            background: rgba(0,0,0,0.1);
        }
        table{
            border-spacing: 0;
        }
    </style>
</head>
<body>

    <table>

        <?php for($i=1; $i<= 120; $i++): ?>

            <tr>

                <?php for($j=1; $j<= 120; $j++): ?>

                    <td><?= $i*$j; ?></td>

                <?php endfor; //end for j ?>

            </tr>
            
        <?php endfor; //end for i ?>

    </table>

</body>
</html>
