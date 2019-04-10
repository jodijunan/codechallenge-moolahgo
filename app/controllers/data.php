<?php
class Data extends Controller
{
    public function index($date='',$amount='', $percentage='')
    {
    #I didn't actually create a db for this test, but that is most probably what I will do :)
    #db credentials

    // $servername = "localhost";
    // $username = "username";
    // $password = "password";
    // $dbname = "myDB";

    // Create connection
    // $conn = new mysqli($servername, $username, $password, $dbname);
    // // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
        // #aquire in form model

        
        $form = $this->model('Form');
        #parse data into model
        $form->date = $date;
        $form->amount = $amount;
        $form->percentage = $percentage;

        #let percentage be 0 if user do not specify 
        if ($percentage == '')
        {
            $percentage = '0';
        }

        #sanatize unclean value
        if (preg_match("/[a-z]/i", $amount)){
            $this->view('data/form');
            $amount = 0;
        }

        if (preg_match("/[a-z]/i", $percentage)){
            $this->view('data/form');
            $percentage = 0;
        }

        $validate_date_amount_presence = call_user_func_array(['Form','validate_date_amount_presence'], array($date,$amount));
        $within_range = call_user_func_array(['Form','validate_percentage_range'], array($percentage));


        $final_amount = $this->final_amount($amount,$percentage);
        $final_tax = $this->taxed_earned($amount,$percentage);

        if ($validate_date_amount_presence AND $within_range)
        {
            $this->view('data/summary',['final_amount' => $final_amount , 'tax' => $final_tax, 'amount' => $amount, 'date'=> $date]);
        } elseif (!$within_range){
            $this->view('data/form');
        } else {
            $this->view('data/form');
        }

        #insert record into sql db
//         $sql = "INSERT INTO DummyData (percent, amt, dates final_amount tax)
// VALUES ($percent, $amount, $date $final_amount $final_tax)";

//         if ($conn->query($sql) === TRUE) {
//             echo "New record created successfully";
//         } else {
//             echo "Error: " . $sql . "<br>" . $conn->error;
//         }

//         $conn->close();

    }

    public function final_amount($amount,$percentage)
    {
        $total_amount = $amount + (($percentage/100) * $amount);
        $final_amount = round($total_amount, 2, PHP_ROUND_HALF_UP);
        return $final_amount;
    }

    public function taxed_earned($amount,$percentage)
    {
        $tax = (($percentage/100) * $amount);
        return $tax;
    }
}