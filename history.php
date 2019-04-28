<?php

require_once 'Transaction.php';

// $history_array = Session;

// function to add data to session
function addToHistory(Transaction $data)
{
    $history_array = ["Date" => $data->getDate(), "ArbitraryAmount" => $data->getArbitraryAmount(), "Percentage" => $data->getPercentage(), "Fee" => $data->getFeeAmount(), "TotalAmount" =>  $data->getTotalAmount()];

    return $history_array;
}
