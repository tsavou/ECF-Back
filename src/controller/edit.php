<?php
class EditController
{
    private $model;

    public function __construct(EditModel $model)
    {
        $this->model = $model;
    }

    public function getMatelasById($matelasId)
    {
        $query = $this->model->db->prepare("SELECT matelas.*, brands.name AS marque, dimensions.name AS dimensions FROM matelas
        INNER JOIN dimensions ON matelas.id_dimension = dimensions.id
        INNER JOIN brands ON matelas.id_brand = brands.id
        WHERE matelas.id = :id");
        $query->bindParam(':id', $matelasId, PDO::PARAM_INT);
        $query->execute();
        $matelas = $query->fetch(PDO::FETCH_ASSOC);

        return $matelas;
    }

    public function getDataForm()
    {
        $data = array(
            'name' => $this->model->name,
            'marque' => $this->model->marque,
            'dimensions' => $this->model->dimensions,
            'poster' => $this->model->poster,
            'prix' => $this->model->prix,
            'promotion' => $this->model->promotion
        );

        return $data;
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

    public function update($matelasId, $data)
    {
        // Si l'image est non renseignée dans le formulaire on regarde s'il existe déjà une image en BDD
        if (empty($data['poster'])) {
            $matelas = $this->getMatelasById($matelasId);
            if (isset($matelas["poster"])) {
                $data['poster'] = $matelas["poster"];
            }
        }

        $query = $this->model->db->prepare("UPDATE matelas SET name = :name, poster = :poster, prix = :prix, promotion = :promotion, id_dimension = :dimensions, id_brand = :marque WHERE id = :id");
        $query->bindParam(':name', $data['name']);       
        $query->bindParam(':poster', $data['poster']);
        $query->bindParam(':prix', $data['prix']);
        $query->bindParam(':promotion', $data['promotion']);
        $query->bindParam(':dimensions', $data['dimensions']);
        $query->bindParam(':marque', $data['marque']);
        $query->bindParam(':id', $matelasId, PDO::PARAM_INT);

        return $query->execute();
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
