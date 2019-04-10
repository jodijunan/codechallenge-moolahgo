<?php
class Home extends Controller
{
    public function index($name = '')
    {
        #aquire i  
        $user = $this->model('User');
        $user->name = $name;
        $this->view('home/index');
    }

    public function create($first_name = '', $last_name = '', $model='User')
    {
        #aquire in user model
        $user = $this->model($model);

        #run validation function/method in user model
        $validate_presence_of_name = call_user_func_array(['User','validate_name_presence'], array($first_name,$last_name));
 
        #redirect to different paths
        if ($validate_presence_of_name)
        {
            $process_data = call_user_func_array(['User','process_name_data'], array($first_name,$last_name));
            $user->name = $process_data;
            $this->view('home/welcome', ['name' => $user->name]);
        } else {
            echo 'Please fill in first and last name';
            $this->view('home/create');
        }

    }
}