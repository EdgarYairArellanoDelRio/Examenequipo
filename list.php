<?php
session_start();
require_once "Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.html");
    exit();
}
$username = $_SESSION['username'];
$sql_fetch_todos = "SELECT * FROM product ORDER BY id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html lang="en">

<head>
    <title>Picky Cars</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="exito.png">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #fd7e1b;
        }
        .header {
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 50px;
            padding: 5px 13px 11px 0px;
            width: 100%;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 0px;
            bottom: 0;
            background-color: #082738;
        }
        .header p {
            margin-left: 20px;
            text-align: left;
        }
        .button-logout {
            position: relative;
            margin-top: -50px;
            margin-right: 20px;
            float: right;
            text-decoration: none;
            border: transparent;
            border-radius: 15px;
            background-color: #610094;
            padding: 10px 10px 10px 10px;
            color: white;
            transition: 0.5s;
        }
        .button-logout:hover {
            background-color: #D9ddd4;
            color: red;
        }
        .container {
            margin: 100px auto;
            margin-bottom: 50px;
            border-radius: 40px;
            text-align: center;
            background-color: #072f5f;
            width: 40%;
            padding-bottom: 3px;
            color: white;
        }
        table th,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px 0px 10px 0px;
        }
        table {
            width: 100%;
        }
        th {
            color: white;
            background-color: #072f5f;
        }
        tr {
            background-color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .timeregis {
            text-align: center;
        }
        .modify {
            text-align: center;
        }
        .delete {
            text-align: center;
        }
        .modify .bfix {
            border-radius: 15px;
            background-color: #583d72;
            color: white;
            text-decoration: none;
            padding: 4px 20px 4px 20px;
            transition: 0.5s;
        }
        .modify .bfix:hover {
            background-color: #734046;
            color: white;
        }
        .delete .bdelete {
            border-radius: 15px;
            background-color: #630000;
            text-decoration: none;
            color: white;
            padding: 4px 20px 4px 20px;
            transition: 0.5s;
        }
        .delete .bdelete:hover {
            background-color: #D9ddd4;
            color: red;
        }
        .Addlist {
            margin-right: 100px;
            padding: 5px 30px 5px 30px;
            border-radius: 15px;
            text-decoration: none;
            color: white;
            background-color: #fe416477;
            transition: 0.5s;
        }
        .Addlist:hover {
            color: white;
            background-color: #150050;
        }
    </style>
</head>
<body background="../inventario/carro.png">
    <div class="header">
        <h3>Picky Cars</h3>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Salir</a>
    </div>
    <div class="container">
        <h1>CARROS VENDIDOS</h1>
        
    </div>
    <div class="table-product">
        <table>
            <tr style="text-aling: center;">
                <th scope="col">Id</th>
                <th scope="col">Matricula</th>
                <th scope="col">Marca</th>
                <th scope="col">Cantidad de pasajeros</th>
                <th scope="col">Fecha de venta</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
            <tbody>
                <?php
                $idpro = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo $idpro ?></td>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['proname'] ?></td>
                        <td><?php echo $row['amount'] ?></td>
                        <td class="timeregis"><?php echo $row['time'] ?></td>
                        <td class="modify"><a name="edit" id="" class="bfix" href="fix.php?id=<?php echo $row['id'] ?>&message=<?php echo $row['proname'] ?>&amount=<?php echo $row['amount']; ?> " role="button">
                                Editar
                            </a></td>
                        <td class="delete"><a name="id" id="" class="bdelete" href="main/delete.php?id=<?php echo $row['id'] ?>" role="button">
                                Eliminar
                            </a></td>
                    </tr>
                <?php
                    $idpro++;
                } ?>
            </tbody>
        </table>
        <br>
        <a name="" id="" class="Addlist" style="float:right" href="addlist.php" role="button">Agregar Producto</a>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>