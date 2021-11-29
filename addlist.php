<?php
session_start();
require_once "Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.html");
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
            background-color: #e60000;
            padding: 10px 10px 10px 10px;
            color: white;
            transition: 0.5s;
        }
        .button-logout:hover {
            background-color: #D9ddd4;
            color: red;
        }
        .container {
            margin: 90px auto;
            margin-bottom: 50px;
            border-radius: 30px;
            text-align: center;
            background-color: #072f5f;
            width: 40%;
            padding-bottom: 10px;
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
            background-color: white;
        }

        .timeregis {
            text-align: center;
        }

        .form-group {
            margin-left: 600px;
        }

        [type=text], [type=number] {
            font-family: "Mitr", sans-serif;
            border-radius: 15px;
            border: 1px solid #536162;
            padding: 7px 200px 7px 5px;
            background-color: #150050;
            color: white;
        }

        .return {
            border-radius: 15px;
            background-color: #fe416477;
            color: white;
            text-decoration: none;
            padding: 4px 40px 4px 40px;
            margin: 0px 0px 50px 100px;
            font-size: 20px;
            transition: 0.5s;

        }

        .return:hover {
            background-color: #610094;
            color: white;
        }

        .modify {
            border-radius: 15px;
            border: transparent;
            color: white;
            padding: 4px 40px 4px 40px;
            margin: 0px 50px 50px 100px;
            font-size: 20px;
            border-collapse: collapse;
            background-color: #072f5f;
            font-family: "Mitr", sans-serif;
            transition: 0.5s;

        }

        .modify:hover {
            color: white;
            background-color: #000000;
        }
    </style>
</head>

<body background="../inventario/carro.png">
    <div class="header">
        <p>Picky Cars</p>
        <a name="" id="" class="button-logout" href="logout.php" role="button" style="background-color: #610094;">Salir</a>
    </div>
    <div class="container">
        <h1>AGREGAR VENTAS</h1>
        <h2>Vendedor: <?php echo $str = strtoupper($username) ?></h2>
    </div>
    <div class="table-product">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col" >ID</th>
                <th scope="col">Matricula</th>
                <th scope="col">Marca</th>
                <th scope="col">Cantidad de pasajeros</th>
                <th scope="col">Fecha de venta</th>
                </tr>
            </thead>
            <tbody >
                <?php
                $idpro = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr style="text-align: center;">
                        <td scope="row"><?php echo $idpro ?></td>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['proname'] ?></td>
                        <td><?php echo $row['amount'] ?></td>
                        <td class="timeregis"><?php echo $row['time'] ?></td>
                    </tr>
                <?php
                    $idpro++;
                } ?>
            </tbody>
        </table>
        <br>
        <div class="addproduct">
            <form method="POST" action="main/addlist.php">
                <div class="form-group">
                    <label for="exampleInputEmail1" style="color:white;">Nombre de marca</label>
                    <br>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" style="color:white;">Cantidad de pasajeros</label>
                    <br>
                    <input type="number" class="form-control" name="amount" required> </div> <br>
                <div class="form-button">
                    <button type="submit" class="modify" style="float:right">Agregar</button>
                    <a name="" id="" class="return" href="list.php" role="button" style="float:left">Regresar</a>
                </div>
            </form>
        </div>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>