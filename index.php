<?php

require_once __DIR__.'/vendor/autoload.php';

use Arrays\HorizontalArray;
use Arrays\DiagonalArray;
use Arrays\SnailArray;
use Arrays\VerticalArray;
use Arrays\SnakeArray;
use Arrays\DbWriter;
use Arrays\PageWriter;
use Arrays\FileWriter;
use Arrays\DatabaseGateway;

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
        $pageWriter = new PageWriter();
        $fileWriter = new FileWriter();
        $dbGateway = new DatabaseGateway();
        $dbWriter = new DbWriter($dbGateway);

        $horizontalArr = new HorizontalArray($_POST["height"], $_POST["width"]);
        $horizontalArr->arraySort();
        $pageWriter->write($horizontalArr->name, $horizontalArr->arr);
        $fileWriter->write($horizontalArr->name, $horizontalArr->arr);
        $dbWriter->write($horizontalArr->name, $horizontalArr->arr);

        $verticalArr = new VerticalArray($_POST["height"], $_POST["width"]);
        $verticalArr->arraySort();
        $pageWriter->write($verticalArr->name, $verticalArr->arr);
        $fileWriter->write($verticalArr->name, $verticalArr->arr);
        $dbWriter->write($verticalArr->name, $verticalArr->arr);

        $snakeArr = new SnakeArray($_POST["height"], $_POST["width"]);
        $snakeArr->arraySort();
        $pageWriter->write($snakeArr->name, $snakeArr->arr);
        $fileWriter->write($snakeArr->name, $snakeArr->arr);
        $dbWriter->write($snakeArr->name, $snakeArr->arr);

        $diagonalArr = new DiagonalArray($_POST["height"], $_POST["width"]);
        $diagonalArr->arraySort();
        $pageWriter->write($diagonalArr->name, $diagonalArr->arr);
        $fileWriter->write($diagonalArr->name, $diagonalArr->arr);
        $dbWriter->write($diagonalArr->name, $diagonalArr->arr);

        $snailArr = new SnailArray($_POST["height"], $_POST["width"]);
        $snailArr->arraySort();
        $pageWriter->write($snailArr->name, $snailArr->arr);
        $fileWriter->write($snailArr->name, $snailArr->arr);
        $dbWriter->write($snailArr->name, $snailArr->arr);

    } catch (Exception $e){
        echo "Error: " . $e->getMessage() . "\n";
    }
}
