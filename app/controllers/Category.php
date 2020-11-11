<?php 

class Category extends Controller{
    public function __construct()
    {
        $this->catModel =$this->model("CategoryModel");
    }

    public function create($data=[]){

        $data=[
            "name"=>"",
            "name_err"=>"",
            "cats"=>$this->catModel->getAllCategory()
        ];

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data['name']=$_POST['name'];
            if(empty($data['name'])){
                $data['name_err']="Category name must be supply";
                $this->view('admin/category/home',$data);
            }else{
                if($this->catModel->getCategoryByName($data['name'])){
                    $data['name_err']="Category name is already exist";
                    $this->view('admin/category/home',$data);
                }else{
                        if($this->catModel->insertNewCategory($data['name'])){
                            flash('cat_create_success','Category create successfull');
                            $data["cats"] = $this->catModel->getAllCategory();
                            $this->view('admin/category/home',$data);
                        }else{
                            flash('cat_create_fail','Category create fail');
                            $this->view('admin/category/home',$data);
                        }
                }
            }

        }else{
            
            $this->view('admin/category/home',$data);
        }


    }

    public function edit($data=[]){
        $dta = [
            "name" => "",
            "name_err" => "",
            "cats" => "",
            "currentCat"=> ""
        ];
        $dta['cats'] = $this->catModel->getAllCategory();
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $dta['name']= $_POST['name'];
            if(!empty($dta['name'])){
               if($this->catModel->updateCategory(getCurrentId(),$dta['name'])){
                   deleteCurrentId();
                   redirect(URLROOT.'category/create');
               }else{
                   $dta['currentCat']= $this->catModel->getCategoryById(getCurrentId());
                   deleteCurrentId();
                   flash("cat_edit_error","Category Update Fail");
                   redirect(URLROOT.'admin/category/create',$dta);
               }
            }else{
                $dta['name_err']="Category name must be supply";
                $dta['currentCat']= $this->catModel->getCategoryById(getCurrentId());
                deleteCurrentId();
                $this->view('admin/category/edit',$dta);
            }

        }else{

            setCurrentId($data[0]);
            $dta['currentCat']= $this->catModel->getCategoryById($data[0]);
           $this->view('admin/category/edit',$dta);
        }
    } 

    public function delete($data=[]){
        if($this->catModel->deleteCat($data[0])){
            redirect(URLROOT.'category/create');
        }else{
            redirect(URLROOT.'category/create');
        }
    }
}