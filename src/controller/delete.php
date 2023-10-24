<?php
class DeleteController
{
    private $model;

    public function __construct(DeleteModel $model)
    {
        $this->model = $model;
    }

    public function delete($matelasId){
        $query = $this->model->db->prepare("DELETE FROM matelas WHERE id = :id");
        $query->bindParam(':id', $matelasId, PDO::PARAM_INT);
        return $query->execute();
    }   
}
