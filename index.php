<?php

require_once __DIR__ . '/vendor/autoload.php';

use Arrays\DatabaseGateway;
use Arrays\Sorters\ArraySorterFactory;
use Arrays\Sorters\ArrayTypes;
use Arrays\Writers\DbWriter;
use Arrays\Writers\FileWriter;
use Arrays\Writers\PageWriter;

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
        $arraysFactory = new ArraySorterFactory();
        $pageWriter = new PageWriter();
        $fileWriter = new FileWriter();
        $dbGateway = new DatabaseGateway();
        $dbWriter = new DbWriter($dbGateway);

        $horizontalArr = $arraysFactory->getSorter($_POST["height"], $_POST["width"], ArrayTypes::HORIZONTAL->name);
        $horizontalArr->arraySort();
        $pageWriter->write($horizontalArr->name, $horizontalArr->array);
        $fileWriter->write($horizontalArr->name, $horizontalArr->array);
        $dbWriter->write($horizontalArr->name, $horizontalArr->array);

        $verticalArr = $arraysFactory->getSorter($_POST["height"], $_POST["width"], ArrayTypes::VERTICAL->name);
        $verticalArr->arraySort();
        $pageWriter->write($verticalArr->name, $verticalArr->array);
        $fileWriter->write($verticalArr->name, $verticalArr->array);
        $dbWriter->write($verticalArr->name, $verticalArr->array);

        $snakeArr = $arraysFactory->getSorter($_POST["height"], $_POST["width"], ArrayTypes::SNAKE->name);
        $snakeArr->arraySort();
        $pageWriter->write($snakeArr->name, $snakeArr->array);
        $fileWriter->write($snakeArr->name, $snakeArr->array);
        $dbWriter->write($snakeArr->name, $snakeArr->array);

        $diagonalArr = $arraysFactory->getSorter($_POST["height"], $_POST["width"], ArrayTypes::DIAGONAL->name);
        $diagonalArr->arraySort();
        $pageWriter->write($diagonalArr->name, $diagonalArr->array);
        $fileWriter->write($diagonalArr->name, $diagonalArr->array);
        $dbWriter->write($diagonalArr->name, $diagonalArr->array);

        $snailArr = $arraysFactory->getSorter($_POST["height"], $_POST["width"], ArrayTypes::SNAIL->name);
        $snailArr->arraySort();
        $pageWriter->write($snailArr->name, $snailArr->array);
        $fileWriter->write($snailArr->name, $snailArr->array);
        $dbWriter->write($snailArr->name, $snailArr->array);

    } catch (Exception $e){
        echo "Error: " . $e->getMessage() . "\n";
    }
}
