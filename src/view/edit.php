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

            if (!empty($_POST)) {
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
