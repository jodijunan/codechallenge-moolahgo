<?php

require_once 'Transaction.php';


function addToHistory(Transaction $data)
{
    $temp_array = $_SESSION["history"];

    $new_transaction = ["Date" => $data->getDate(), "ArbitraryAmount" => $data->getArbitraryAmount(), "Percentage" => $data->getPercentage(), "Fee" => $data->getFeeAmount(), "TotalAmount" =>  $data->getTotalAmount()];

    array_push($temp_array, $new_transaction);
    
    return $_SESSION["history"] = $temp_array;
}

function clearHistory()
{
    $_SESSION["history"] = [];
}
