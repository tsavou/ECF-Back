<?php
class HomeController
{
    private $model;

    public function __construct(HomeModel $model)
    {
        $this->model = $model;
    }

    public function getMatelas()
    {
        $query = $this->model->db->query("SELECT matelas.*, brands.name AS marque, dimensions.name AS dimensions FROM matelas
        INNER JOIN dimensions ON matelas.id_dimension = dimensions.id
        INNER JOIN brands ON matelas.id_brand = brands.id");
        $query->execute();
        $matelas = $query->fetchAll(PDO::FETCH_ASSOC);

        return $matelas;
    }
}
