<?php
session_start();
if(isset($_POST["choosenDate"])){

$arr = array();
$ChoosenDate = $_POST["choosenDate"];
$percent = $_POST["percentage"];
$Aamount = $_POST["AbritraryAmount"];
$famount = $_POST["famount"];
$fee = $famount * 0.05;
if($_SESSION["cc"] == ""){
$_SESSION["cc"] = $ChoosenDate;
$_SESSION["percentage"] = $percentage;
$_SESSION["Aamount"] = $Aamount;
$_SESSION["famount"] = $famount;
$_SESSION["fee"] = $fee;
}else{
$_SESSION["cc"] = $_SESSION["cc"].",".$ChoosenDate;	
$_SESSION["percentage"] = $_SESSION["percentage"].",".$percent;
$_SESSION["Aamount"] = $_SESSION["Aamount"].",".$Aamount;
$_SESSION["famount"] = $_SESSION["famount"].",".$famount;
$_SESSION["fee"] = $_SESSION["fee"].",".$fee;
}
echo "History <br>";
if (strpos($_SESSION["cc"], ',') !== false) {
    $excc = explode(",",$_SESSION["cc"]);
    $exper = explode(",",$_SESSION["percentage"]);
    $exaa = explode(",",$_SESSION["Aamount"]);
    $exfa = explode(",",$_SESSION["famount"]);
    $exfee = explode(",",$_SESSION["fee"]);
    for($i =0; $i < sizeof($excc); $i++){
    	echo"Date: ".$excc[$i]."<br>"."percentage: ".$exper[$i]."%<br>"."Abritrary Amount: $".$exaa[$i]."<br>"."Final Amount: $".$exfa[$i]."<br>"."Fee: $".$exfee[$i]."<br><br>";
    }
}else{
	echo"Date: ".$ChoosenDate."<br>"."percentage: ".$percent."%<br>"."Abritrary Amount: $".$Aamount."<br>"."Final Amount: $".$famount."<br>"."Fee: $".$fee;
}
}else if(isset($_SESSION["cc"])){
	echo "History <br><br>";

 $excc = explode(",",$_SESSION["cc"]);
    $exper = explode(",",$_SESSION["percentage"]);
    $exaa = explode(",",$_SESSION["Aamount"]);
    $exfa = explode(",",$_SESSION["famount"]);
    $exfee = explode(",",$_SESSION["fee"]);
    for($i =0; $i < sizeof($excc); $i++){
    	echo"Date: ".$excc[$i]."<br>"."percentage: ".$exper[$i]."%<br>"."Abritrary Amount: $".$exaa[$i]."<br>"."Final Amount: $".$exfa[$i]."<br>"."Fee: $".$exfee[$i]."<br><br>";
    }
}



?>