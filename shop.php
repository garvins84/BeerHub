<?php include 'navbar.php'; ?>
<?php include 'main-ad.php'; ?>
<?php include 'connection.php'; ?>
<!DOCTYPE html>

<html lang="en">
<!-- comment -->

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="shop.css">
    <script src="shop.js"></script>
</head>
<body>
    <div class="container">
        
            <div id="left-item" style="float: left">
                <table class="table table-striped">
                    <th> Filter By </th>
                    <tr>
                        <td>
                            <div style="overflow-y: hidden; overflow-x: hidden;">
                                <ul class="nav nav-list">
                                    <li><label class="tree-toggler nav-header">Brand</label>
                                        <ul class="nav nav-list tree">
                                        <?php 
                                        $getBeer = mysqli_query($connection, "SELECT * FROM beer_brand_list");
                                        while($beerRow = mysqli_fetch_assoc($getBeer)){
                                            $beerRows[] = $beerRow;
                                        }
                                        foreach ($beerRows as $beerRowItem){
                                         echo "<li><input type='checkbox'>";
                                         echo $beerRowItem['BeerBrand'];
                                         echo "</input></li>";
                                        }	
                                        ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>Price</center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>Name</center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>Type</center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>item5</center>
                        </td>
                    </tr>
                </table>
                </div>
                <div class="catalog" style="float: left">
                    <?php 
                    $result = mysqli_query($connection, "SELECT * FROM inventory LEFT JOIN inventory_images ON (inventory.id = inventory_images.ItemId)");
                    while($row = mysqli_fetch_assoc($result)){
                        $rows[] = $row;
                    }
                    $i = 0;
                    $itemnumber= 1;
                    echo "<div class='container-fluid'>";
                    echo "<center>";
                    echo "<br>";
                    foreach ($rows as $rowitem){
                        if ($i % 4 === 0){
                            echo "<div class='row'>";
                        }
                        echo "<div class='col-md-4 col-lg-4 product-container'>";
                        echo "<center><strong>". $rowitem['BeerName'] ."</strong></center>";
                        echo "<center><img id='image-layer' src='". $rowitem['ImageString'] ."'></center>";
                        echo "<br>";
                        echo "<div class='row'>";
                        echo "<div class='col-md-5 col-lg-5' style='padding-bottom: 5%'>";
                        echo "<center><button id=view-item'" . $itemnumber . "'>view</button></center>";
                        echo "</div>";
                        echo "<div class='col-md-7 col-lg-7'>";
                        echo "<center><button class=add-item count='" . $itemnumber . "'>add to cart</button></center>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        if ($i == 3){
                            echo "</div>";
                            echo "<br>";
                        }
                        if($i == 4)
                        {
                            $i = 0;
                        }
                        $i = $i + 1;
                        $itemnumber ++;
                    }
                    echo "</center>";
                    echo "</div>";
                ?>
                </div>
            </div>

            <script>
            $(document).ready(function(){
                $('.catalog').on('click', 'button.add-item', function(e){
                    $.ajax({
                        type: "POST",
                        url: "add-item.php",
                        data: {
                            itemId: $(this).attr('count'),
                            userId: <?php echo $_SESSION['uid']; ?>
                        },
                        success: function(data){
                        alert("Item added to cart!");   
                        },
                    });
                })
            });
            </script>
        
</body>

</html>