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

    public function add(): bool
    {

        $query = $this->model->db->prepare("INSERT INTO matelas (name, marque, dimensions, poster, prix, promotion) VALUES (:name, :marque, :dimensions, :poster, :prix, :promotion)");
        $query->bindParam(':name', $this->model->name);
        $query->bindParam(':marque', $this->model->marque);
        $query->bindParam(':dimensions', $this->model->dimensions);
        $query->bindParam(':poster', $this->model->poster);
        $query->bindParam(':prix', $this->model->prix);
        $query->bindParam(':promotion', $this->model->promotion);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}

  
