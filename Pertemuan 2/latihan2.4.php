<?php
$x = 100;
$y = 50;

if ($x >= 100 and $y == 50) {
    echo "Hello World and!";
}
echo "<br>";

if ($x >= 100 or $y == 80) {
    echo "Hello World or!";
}
echo "<br>";

if ($x >= 100 && $y <= 50) {
    echo "Hello World &&!";
}
echo "<br>";

if ($x >= 100 || $y <= 80) {
    echo "Hello World ||";

}
echo "<br>";

if ($x !== 100) {
    echo "Hello World! not";
}
echo "<br>";
?>