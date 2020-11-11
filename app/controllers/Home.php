<?php

class Home extends Controller{

    public function __construct()
    {
       $this->postModel = $this->model("PostModel");
       $this->catModel  = $this->model("CategoryModel");
    }
    
    // public function Index($params=[]){
    //     $data=[
    //         "cats" => '',
    //         "posts"=> ''
    //     ];
    //      $data = $this->userModel->getAllUser();
    //      $data['cats'] = $this->catModel->getAllCategory();
    //      $data['posts'] = $this->postModel->getPostById($params[0]);
    //      $this->view("home/index",$data);
    //  }

     public function index($params=[]){
        $data=[
            "cats" => '',
            "posts"=> ''
        ];

        $data['cats'] = $this->catModel->getAllCategory();
        $data['posts'] = $this->postModel->getAllPost();

        
        $this->view('home/index',$data);
    }
}





