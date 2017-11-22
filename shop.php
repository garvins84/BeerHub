<?php include 'navbar.php'; ?>
<?php include 'main-ad.php'; ?>
<?php include 'connection.php'; ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="shop.css">
</head>

<body>
    <div class="container">
        <div class="row">
    <div id="sidebar">
        <div class="col-md-3 col-lg-3">
        <table class="table table-striped">
            <tr>
                <td><center>item1</center></td>
            </tr>
            <tr>
                <td><center>item2</center></td>
            </tr>
            <tr>
                <td><center>item3</center></td>
            </tr>
            <tr>
                <td><center>item4</center></td>
            </tr>
            <tr>
                <td><center>item5</center></td>  
            </tr>
        </table>
    </div>
        </div>
    <div class="col-md-9 col-lg-9">
    <div class="catalog">
    <?php 
    $result = mysqli_query($connection, "SELECT * FROM inventory JOIN inventory_images ON (inventory.id = inventory_images.ItemId)");
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
        $i = 0;
        echo "<div class='container-fluid'>";
        echo "<br>";
        foreach ($rows as $rowitem){
            if ($i % 2 === 0)
                echo "<div class='row'>";
            echo "<div class='col-md-4 col-lg-4 product-container'>";
            echo "<center><strong>". $rowitem['BeerName'] ."</strong</center>";
            echo "<center><img id='image-layer' src='". $rowitem['ImageString'] ."'></center>";
            echo "<br>";
            echo "<row>";
            echo "<div class='col-md-5 col-lg-5' style='padding-bottom: 5%'>";
            echo "<center><button>view</button></center>";
            echo "</div>";
            echo "<div class='col-md-7 col-lg-7'>";
            echo "<center><button>add to cart</button></center>";
            echo "</div>";
            echo "</row>";
            echo "</div>";
            if ($i == 2){
                echo "</div>";
                echo "<br>";
                $i = 0;
            }
            $i = $i + 1;
        }
        echo "</div>";
    ?>
    </div>
            </div>
        </div>
    </div>
</body>

</html>
