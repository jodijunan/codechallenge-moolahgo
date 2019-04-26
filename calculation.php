<?php
require "Fee.php";

function calculate($date, $amount, $percentage)
{
    $fee = $amount * $percentage;
    $result = ["date" => $date, "fee" => $fee, "totalAmount" => $amount + $fee];
    return json_encode($result);
}

if (isset($_POST["amount"])) {
    $amount = (int)$_POST["amount"];
    $percentage = (float)$_POST["percentage"] / 100;
    $result = calculate($_POST["date"], $amount, $percentage);

    $fee = new Fee();

    $fee->setDate($_POST["date"]);
    $fee->setArbitraryAmount($_POST["amount"]);
    $fee->setPercentage($_POST["percentage"]);
    $fee->setFeeAmount(json_decode($result)->fee);
  
    $fee->insert();

    // Get the result fee from database and display

    echo $result;
}
