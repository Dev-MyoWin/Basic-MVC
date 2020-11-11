<?php

class User extends Controller{

    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
    }



    public function register(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){


            $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data=[
            "name"              => $_POST['name'],
            "email"             => $_POST['email'],
            "password"          => $_POST['password'],
            "confirm_password"  => $_POST['confirm_password'],
            "name_err"          => '',
            "email_err"         => '',
            "password_err"      => '',
            "confirm_password_err"=>'',
            ];

        

        if(empty($data['name'])){
            $data['name_err']="User name is required";
        }

        if(empty($data['email'])){
            $data['email_err']="Email is required";
        }else{
            if($this->userModel->getUserByEmail($data['email'])){
                $data['email_err']="Email is already taken";
            }
        }

        if(empty($data['password'])){
            $data['password_err']="Password is required";
        }

        if(empty($data['confirm_password'])){
            $data['confirm_password_err']="Confirm password is required";
        }else{
            if($data['password'] != $data['confirm_password']){
            $data['confirm_password_err']="Password do not match";
            }
        }

        if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) ){
            if($this->userModel->register($data['name'],$data['email'],$data['password'])){
                flash('register_success',"Register successfull, please login");
                $this->view("user/login");
            }
            else{
                $this->view("user/register");
            }
        }else{
            
            $this->view("user/register",$data);
        }
      
        }else{
            $this->view("user/register");
        }
    }


    public function login(){

        if($_SERVER['REQUEST_METHOD'] == "POST"){


            $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data=[
            "email"             => $_POST['email'],
            "password"          => $_POST['password'],
            "email_err"         => '',
            "password_err"      => '',
            
            ];

            if(empty($data['email'])){
                $data['email_err']="Email is required";
            }

            if(empty($data['password'])){
                $data['password_err']="Password is required";
            }

            if(empty($data['email_err']) && empty($data['password_err']) ){
                $rowUser = $this->userModel->getUserByEmail($data['email']);
                if($rowUser){
                    $hash_pass = $rowUser->password;
                    if(password_verify($data['password'],$hash_pass)){
                        setUserSession($rowUser);
                       redirect(URLROOT.'admin/home');
                
                    }else{
                        flash('login_fail','User crenditial error');
                        $this->view('user/login');  

                    }
                }else{
                    $data['email_err'] =" Email error";
                }

            }else{
                
                $this->view("user/login",$data);
            }
      
        }else{
            $this->view("user/login");
        }

        
    }


    public function logout(){
        unsetUserSession();
        redirect(URLROOT);
    }
}