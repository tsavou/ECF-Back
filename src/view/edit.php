<?php
class EditView
{
    public $controller;
    public $template;


    public function __construct(EditController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "edit.php";
    }

    public function render()
    {
        $message = "";


        if (isset($_GET['id'])) {
            $matelasId = $_GET['id'];
            $matelas = $this->controller->getMatelasById($matelasId);
            $brands = $this->controller->getBrands();
            $dimensions = $this->controller->getDimensions();

            if (!empty($_POST)) {
                if (isset($_FILES["poster"]) && $_FILES["poster"]["error"] === UPLOAD_ERR_OK) {
                    $this->controller->uploadImage($_FILES["poster"]);
                }
                $data = $this->controller->getDataForm();
                if ($this->controller->update($matelasId, $data)) {
                    header("Location: index.php");
                } else {
                    $message = "Erreur de base de données";
                }
            }
            require_once($this->template);
        }
    }
}
