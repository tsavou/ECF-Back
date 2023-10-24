<?php
class DeleteView
{
    public $controller;

    public function __construct(DeleteController $controller)
    {
        $this->controller = $controller;
    }

    public function render()
    {
        if (isset($_GET['id'])) {
            $matelasId = $_GET['id'];
            if ($this->controller->delete($matelasId)) {
                header("Location: index.php");
            } else {
                echo "Erreur de base de donneé";
            }
        }
    }
}
