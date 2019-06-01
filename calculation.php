<?php

session_start();

require_once "Transaction.php";
require_once "history.php";

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
} else {
    clearHistory();
    echo json_encode($_SESSION["history"]);
}
