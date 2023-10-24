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
        $query = $this->model->db->query("SELECT * FROM matelas ORDER BY id");
        $query->execute();
        $matelas = $query->fetchAll(PDO::FETCH_ASSOC);

        return $matelas;
    }
}
