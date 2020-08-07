<?php
if(isset($_GET['x_set']) && isset($_GET['y_set']) &&
    isset($_GET['r_set']))
{
    $Y = $_GET['y_set'];
    $X = $_GET['x_set'];
    $R = $_GET['r_set'];

}
else
{
    echo "Введенные данные некорректны";
}
?>

