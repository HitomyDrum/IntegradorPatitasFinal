<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td>Clientes</td>
                <td>Contraseña</td>
                <td>DNI Real</td>
            </tr>
        </thead>
        <tbody>
            <?php

                foreach($clientes as $user) {
                    echo "<tr>";
                    echo "<td>".$user['NOM_CLI']."</td>";
                    echo "<td>".$user['PASS_CLI']."</td>";
                    echo "<td>".$user['DNI_CLI']."</td>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>