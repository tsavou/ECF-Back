<?php
class AddController
{
    private $model;

    public function __construct(AddModel $model)
    {
        $this->model = $model;
    }

    public function getDataForm()
    {
        return array(
            'name' => $this->model->name,
            'marque' => $this->model->marque,
            'dimensions' => $this->model->dimensions,
            'poster' => $this->model->poster,
            'prix' => $this->model->prix,
            'promotion' => $this->model->promotion
        );
    }

    public function uploadImage($file){
       $fileTmpPath =$file["tmp_name"];
       $fileName = $file["name"];
       $fileType = $file["type"];

       $fileNameArray = explode(".", $fileName);

       $fileExtension = end($fileNameArray);

       $newFileName = md5($fileName . time()) . "." . $fileExtension;

       $fileDestPath = "./assets/img/poster/{$newFileName}";

       $allowedTypes = array("image/jpeg", "image/png", "image/webp", "image/jpg");

       if (in_array($fileType, $allowedTypes)) {
           move_uploaded_file($fileTmpPath, $fileDestPath);

           $this->model->poster = $newFileName;
       } else {
           return false;
       }
       return true;

    }

    public function add()
    {

        $query = $this->model->db->prepare("INSERT INTO matelas (name, poster, prix, promotion, id_dimension, id_brand) VALUES (:name, :poster, :prix, :promotion, :dimensions, :marque)");
        $query->bindParam(':name', $this->model->name);     
        $query->bindParam(':poster', $this->model->poster);
        $query->bindParam(':prix', $this->model->prix);
        $query->bindParam(':promotion', $this->model->promotion);
        $query->bindParam(':dimensions', $this->model->dimensions);
        $query->bindParam(':marque', $this->model->marque);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getBrands()
    {
        $query = $this->model->db->query("SELECT * FROM brands;");
        $res = $query->fetchAll();
        return $res;
    }

  
    public function getDimensions()
    {
        $query = $this->model->db->query("SELECT * FROM dimensions;");
        $res = $query->fetchAll();
        return $res;
    }
    
    
}

  
