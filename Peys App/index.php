<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
</head>

<body>

    <h1>Peys App</h1>

    <?php
    // Capture form input with default values for size and border color
    $size = !empty($_POST['size']) ? intval($_POST['size']) : 60;
    $borderColor = !empty($_POST['borderColor']) ? htmlspecialchars($_POST['borderColor']) : '#000000';

    // Define canvas dimensions based on size input
    $canvasWidth = $canvasHeight = $size;
    ?>

    <form method="post">
        <label for="size">Select Photo Size:</label>
        <input type="range" id="size" name="size" min="10" max="100" value="<?php echo $size; ?>" step="10"
            oninput="document.getElementById('sizeOutput').textContent = this.value">
        <output id="sizeOutput"><?php echo $size; ?></output>

        <br><br>

        <label for="borderColor">Select Border Color:</label>
        <input type="color" id="borderColor" name="borderColor" value="<?php echo $borderColor; ?>">

        <br><br>

        <button type="submit">Process</button>

        <br><br>

        <div class="image-container"
            style="border: 3px solid <?php echo $borderColor; ?>; width: <?php echo $canvasWidth; ?>px; height: <?php echo $canvasHeight; ?>px; overflow: hidden;">
            <img src="img/ghost.jpg" alt="Image for Canvas" width="<?php echo $canvasWidth; ?>" height="<?php echo $canvasHeight; ?>">
        </div>
    </form>
</body>
</html>
