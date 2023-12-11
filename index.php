<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autók</title>
    <!--Scripts-->
    <script src="js/jquery-3.7.1.js" type="text/javascript"></script>
    <script src="js/cars.js" type="text/javascript"></script>
    <!--Fonts-->


    <!--Styles-->
    <link href="fontawesome/css/all.css" rel="stylesheet" type="text/css">
    <link href="css/cars.css" rel="stylesheet" type="text/css">
</head>

<body>
    <nav>
        <a href="index.php"><i class="fa fa-home" title="Kezdőlap"></i></a>
        <a href="makers.php"><button>Gyártók</button></a>
        <a href="models.php"><button>Modellek</button></a>
    </nav>
    <h1>Gyártók</h1>
    <tbody>
    <?php
        require_once 'dbmaker.php';
        $carMaker = new DBMaker();
        $abc = $carMaker->getAbc();
        var_dump($abc);
        return;
        
        echo"<div style='display: flex'>";
        foreach ($abc as $char)
        {
            echo "
                <form method='post' action='index.php'>
                    <input type='hidden' name='abc' value='{$char['abc']}'>
                    <button type='submit'>{$char['abc']}</button>&nbsp;
                </form>
                ";
        }
        echo"</div><br>";


        ?>
        </tbody>

        <tbody>
        <?php
        $abc = $_POST['abc'];
        $makers = $carMakers->getByFirstCh($abc);
        foreach ($makers as $maker)
        {
            $id = $maker['id'];
            $name = $maker['name'];
            echo "<tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>Mod / Del</td>
                  </tr>";
        }
        ?>
        </tbody>
    <table>
</body>
<footer>

</footer>
</html>";