<?php
class AddView
{
    public $controller;
    public $template;

    public function __construct(AddController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "add.php";
    }

    public function render()
    {
        $message = "";
        $brands = $this->controller->getBrands();
        $dimensions = $this->controller->getDimensions();
        
        if (!empty($_POST)) {
            if (isset($_FILES["poster"]) && $_FILES["poster"]["error"] === UPLOAD_ERR_OK) {
                $this->controller->uploadImage($_FILES["poster"]);
            }

            $data = $this->controller->getDataForm();


            if ($this->controller->add()) {
                header("Location: index.php");
            } else {
                $message = "Erreur de base de données";
            }
        }
        require($this->template);
    }
}
