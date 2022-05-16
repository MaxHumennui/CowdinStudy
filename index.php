<?php

require_once __DIR__.'/vendor/autoload.php';

use Arrays\HorizontalArray;
use Arrays\DiagonalArray;
use Arrays\VerticalArray;
use Arrays\SnakeArray;
use Arrays\SnailArray;

?>

<form method="post">
    <label for="width">
        Width:
    </label><br>
    <input type="number" name="width" id="width" min="1"><br>
    <label for="height">
        Height:
    </label><br>
    <input type="number" name="height" id="height" min="1"><br>
    <input type="submit" name="Submit" value="Submit">
</form>

<?php

if($_POST["height"] && $_POST["width"]){
    try {
        $horizontalArr = new HorizontalArray($_POST["height"], $_POST["width"]);
        $horizontalArr->arraySort();
        $horizontalArr->printArray();
        $horizontalArr->printArrayInFile();
        echo "=============================| <br>";

        $verticalArr = new VerticalArray($_POST["height"], $_POST["width"]);
        $verticalArr->arraySort();
        $verticalArr->printArray();
        $verticalArr->printArrayInFile();
        echo "=============================| <br>";

        $snakeArr = new SnakeArray($_POST["height"], $_POST["width"]);
        $snakeArr->arraySort();
        $snakeArr->printArray();
        $snakeArr->printArrayInFile();
        echo "=============================| <br>";

        $diagonalArr = new DiagonalArray($_POST["height"], $_POST["width"]);
        $diagonalArr->arraySort();
        $diagonalArr->printArray();
        $diagonalArr->printArrayInFile();
        echo "=============================| <br>";

        $snailArr = new SnailArray($_POST["height"], $_POST["width"]);
        $snailArr->arraySort();
        $snailArr->printArray();
        $snailArr->printArrayInFile();
    }catch (Exception $e){
        echo "Error: " . $e->getMessage() . "\n";
    }
}
