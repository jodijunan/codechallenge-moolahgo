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
    $latest_history_data = end($history_data);

    $result = ["totalAmount" => $transaction->getTotalAmount(),
                "history" => $history_data];

    echo json_encode($result);
} elseif ($_POST["clear_history"]) {
    clearHistory();
    echo json_encode($_SESSION["history"]);
}
