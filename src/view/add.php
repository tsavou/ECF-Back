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
        if (!empty($_POST)) { {
                $data = $this->controller->getDataForm();

                if ($this->controller->add()) {
                    header("Location: index.php");
                } else {
                    $message = "Erreur de base de données";
                }
                
                require($this->template);
            }
        }
    }
}
