<?php
    $range = 60;
    $color = "#000000";

    if (isset($_POST['btnProcess'])) {
        $range = $_POST['txtVolume'];
        $color = $_POST['clrTheme'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
</head>
<body>
    <form action="" method="post">
    <h2>Peys App</h2>

    <label for="txtVolume">Select Photo Size:</label>
    <input type="range" name="txtVolume" id="txtVolume" min="10" max="100" step="10" value="<?php echo $range; ?>"><br>

    <label for="clrTheme">Select Border Color:</label>
    <input type="color" name="clrTheme" id="clrTheme" value="<?php echo $color; ?>"><br>

    <button type="submit" name="btnProcess">Process</button>

    <?php
    $imageUrl = "img/profile.jpg";
    ?>

    <div id="imageContainer">
        <img id="image" src="<?php echo $imageUrl; ?>" alt="Image" width="<?php echo $range; ?>%" style="border: 2px solid <?php echo $color; ?>;">
    </div>

    </form>

</body>
</html>
