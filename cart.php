<?php include 'navbar.php'; ?>
<?php include 'connection.php'; ?>
<!DOCTYPE html>

<html lang="en">
<!-- comment -->

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="cart.css">
    <script src="cart.js"></script>
</head>
<body>
    <div>
        <h1>Your Shopping Cart</h1>
        <table style="width:100%">
            <th>
                <tr style="border-style: solid; border-width:1px;">
                    <td>Quantity</td>
                    <td>Item</td>
                    <td>Subtotal</td>
                </tr>
            </th>
            <?php 
                $subtotal_all = 0.00;
                $subtotal_individual = 0.00;
                $result = mysqli_query($connection, "SELECT inventory_images.ImageString, inventory.BeerName, inventory.ItemPrice, user_cart.Quantity FROM user_cart LEFT JOIN inventory ON (user_cart.ItemId = inventory.id) LEFT JOIN inventory_images ON (user_cart.ItemId = inventory_images.ItemId) WHERE UserId ='" . $_SESSION['uid'] . "'");
                while($row = mysqli_fetch_assoc($result)){
                    $rows[] = $row;
                }
                $i = 0;
                $itemnumber= 1;
                foreach ($rows as $rowitem){
                    $subtotal_all += $rowitem['Quantity'] * $rowitem['ItemPrice'];
                    echo "<tr  style='border-style: solid; border-width:1px;'>";
                    echo "<td>" . $rowitem['Quantity'] . "</td>";
                    echo "<td><img id='image-layer' src='". $rowitem['ImageString'] ."'>" . $rowitem['BeerName'] . "</td>";
                    echo "<td> $" . number_format($rowitem['Quantity'] * $rowitem['ItemPrice'], 2) . "</td>";
                    echo "</tr>";
                }
            ?>
            <tr style="border-style: solid; border-width:1px;">
                <td colspan=2 style="border-style: solid; border-width:1px;">Calculate Shipping</td>
                <td>
                    <?php                 
                        $result = mysqli_query($connection, "SELECT * FROM state_tax_shipping");
                        $row = mysqli_fetch_assoc($result);
                        //while($row = mysqli_fetch_assoc($result)){
                            //$rows[] = $row;
                        //}
                        $shipping = $row['ship_fee'];
                        $tax = $row['tax'];
                        $pricewithtax = ($subtotal_all + $shipping) * $tax;
                ?>
                    <div>
                    <p>Subtotal: <?php echo "$" . number_format($subtotal_all, 2); ?></p>
                    <p>Shipping & Handling (UPS Ground):<?php echo "$" . number_format($shipping,2); ?></p>
                    <p>Sales Tax:<?php echo "$" . number_format($pricewithtax,2); ?></p>
                    </div>
                    <div class="border-style:solid; border-top: 1px;"
                    <p>Total:<?php echo "$" . number_format($subtotal_all + $shipping + $pricewithtax,2);; ?></p>
                </td>
            </tr>
            <tr style="border-style: solid; border-width:1px;">
                <td colspan=2 style="border-style: solid; border-width:1px;">
                    <p>Related Products</p>
                </td>
                <td>
                    <button id="checkout-btn">CHECKOUT</button>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>