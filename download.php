<?php

header("Pragma: public");
header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
header("Content-Type : application/txt");
header("Content-Transfer-Encoding : Binary");
header("Content-Disposition : attachment; filename: " . $_GET["file"]);
readfile($_GET["urlFile"]);