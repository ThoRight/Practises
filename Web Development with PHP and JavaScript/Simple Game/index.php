<?php
$initialScore = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Click Game</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Click Game</h1>
    <div id="game-container">
        <div id="moving-object"></div>
    </div>
    <p>Score: <span id="score"><?php echo $initialScore; ?></span></p>
    <button id="easy-mode">Easy Mode</button>
    <button id="hard-mode">Hard Mode</button>
    <script src="jquery3.7.1.js"></script>
    <script src="script.js"></script>
</body>

</html>