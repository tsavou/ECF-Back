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
        $query = $this->model->db->prepare("SELECT * FROM matelas WHERE id = :id");
        $query->bindParam(':id', $matelasId, PDO::PARAM_INT);
        $query->execute();
        $matelas= $query->fetch(PDO::FETCH_ASSOC);

        return $matelas;
      
    }

    public function getDataForm()
    {
        $data= array(
            'name' => $this->model->name,
            'marque' => $this->model->marque,
            'dimensions' => $this->model->dimensions,
            'poster' => $this->model->poster,
            'prix' => $this->model->prix,
            'promotion' => $this->model->promotion
        );

        return $data;
    }

    public function update($matelasId,$data)
    {
        $query = $this->model->db->prepare("UPDATE matelas SET name = :name, marque = :marque, dimensions = :dimensions, poster = :poster, prix = :prix, promotion = :promotion WHERE id = :id");
        $query->bindParam(':name', $data['name']);
        $query->bindParam(':marque', $data['marque']);
        $query->bindParam(':dimensions', $data['dimensions']);
        $query->bindParam(':poster', $data['poster']);
        $query->bindParam(':prix', $data['prix']);
        $query->bindParam(':promotion', $data['promotion']);
        $query->bindParam(':id', $matelasId, PDO::PARAM_INT);

        return $query->execute(); 
    }
   
   


}