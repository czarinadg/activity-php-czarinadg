<?php
    $drpSize = [
        "Regular" => "Regular", 
        "Up Size" => "Up-Size (add ₱ 5)", 
        "Jumbo" => "Jumbo (add ₱ 10)"
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendo Machine</title>
</head>
<body>
    <form method="post">
        <h2>Vendo Machine</h2>
        <fieldset style="width:30%">
            <legend>Products:</legend>
            <input type="checkbox" name="chkFood[]" id="chkCoke" value="Coke">
            <label for="chkCoke">Coke - ₱ 15</label><br>
            
            <input type="checkbox" name="chkFood[]" id="chkSprite" value="Sprite">
            <label for="chkSprite">Sprite - ₱ 20</label><br>
            
            <input type="checkbox" name="chkFood[]" id="chkRoyal" value="Royal">
            <label for="chkRoyal">Royal - ₱ 20</label><br>
            
            <input type="checkbox" name="chkFood[]" id="chkPepsi" value="Pepsi">
            <label for="chkPepsi">Pepsi - ₱ 15</label><br>
            
            <input type="checkbox" name="chkFood[]" id="chkMountainDew" value="Mountain Dew">
            <label for="chkMountainDew">Mountain Dew - ₱ 20</label><br>

        </fieldset>

        <fieldset style="width:30%">
            <legend>Options:</legend>
            <label for="size">Size: </label>
            <select name="drpSize">
                <?php 
                 foreach ($drpSize as $key => $value) {
                    echo '<option value="'. $key . '">' . $value . '</option>';
                 }
                ?>
            </select>
            <label for="Quantity">Quantity: </label>
            <input type="number" name="txtQuantity" id="txtQuantity" value="0">
            
            <button type="submit" name="btnCheckOut">Check Out</button>

        </fieldset>
    </form>
</body>

<?php
    if (isset($_POST['btnCheckOut'])) {
        $quantity = $_POST['txtQuantity'];
        $sizeLabel = $_POST['drpSize'];
        $totalValue = 0;
        $totalItems = 0;
        
        

        if (empty($_POST['chkFood'])) {
            echo "No Selected Product, Try Again.";
        } else {
            if ($quantity == '0') {
            echo "Invalid Quantity";
        } else {
            echo "<h3>Purchase Summary:</h3>";
            foreach ($_POST['chkFood'] as $foodItem) {
                if ($foodItem == 'Coke') {
                 $price = 15;
                } elseif ($foodItem == 'Sprite') {
                 $price = 20;
                } elseif ($foodItem == 'Royal') {
                 $price = 20;
                } elseif ($foodItem ==  'Pepsi') {
                 $price = 15;
                } elseif ($foodItem == 'Mountain Dew') {
                 $price = 20;
                }
                
                if ($sizeLabel == 'Regular') {
                    $newPrice = $price;
                } elseif ($sizeLabel == 'Up Size') {
                    $newPrice = $price + 5;
                } elseif ($sizeLabel == 'Jumbo') {
                    $newPrice = $price + 10;
                }

                
                $itemTotal = $newPrice * $quantity;
                $totalValue += $itemTotal;
                $totalItems += $quantity;

                echo "<ul><li> $quantity pieces of $sizeLabel $foodItem amounting to $itemTotal</li></ul>";
             }
             echo "<h4>Total Number of Items: $totalItems <br> Total Amount: $totalValue</h4>";
             
            
         }
           
        }
        
        }
?>
</html>