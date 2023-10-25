<?php
class AboutView
{
    public $controller;
    public $template;

    public function __construct(AboutController $controller)
    {
        $this->controller = $controller;    
        $this->template = DIR_TEMPLATE . "about.php";
    }

    public function render()
    {
        $data = array("fred","theo","brayan","alex","sam", "loic","marinev","matthieu","olivier", "paolo","marineb","angelique","julian","laeticia", "sylvain", "remy");         
   

        
        require($this->template);
    }

    
}