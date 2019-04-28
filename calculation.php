<?php
require_once "Transaction.php";
require "history.php";


if (isset($_POST["amount"])) {
    $transaction = new Transaction();

    $transaction->setDate($_POST["date"]);
    $transaction->setArbitraryAmount($_POST["amount"]);
    $transaction->setPercentage($_POST["percentage"]);
    $transaction->setFeeAmount();
    $transaction->setTotalAmount();

    $history_data = addToHistory($transaction);

    $result = ["totalAmount" => $transaction->getTotalAmount(), "history" => $history_data];
    
    $response = json_encode($result);
    echo $response;
}
