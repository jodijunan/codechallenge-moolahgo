<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'model.php';

$myModel = new myModel();

if (file_get_contents('php://input')) {

    $data = json_decode(file_get_contents('php://input'));

    $req = $data->request;


    switch ($req) {
        case "save":
            $myModel->setData($data->data);
            $id = $myModel->write();
            echo json_encode(['id' => $id]);
            break;

        case "all" :
            $stmt = $myModel->read();
            $result = mysqli_stmt_get_result($stmt);

            $arr = [];
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $arr[] = $row;
                }
            }

            $stmt->close();

            echo json_encode($arr);

            break;

    }
}