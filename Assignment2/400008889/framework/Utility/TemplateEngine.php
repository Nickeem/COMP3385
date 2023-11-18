<?php
namespace Utility;
include_once 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';

class TemplateEngine {
    private $templateData;

    public function assign($name, $value) 
    {
        $this->templateData[$name] = $value;
    }

    public function render($templateFile)
    {
        if (file_exists($templateFile))
        {
            ob_start();       
            extract($templateData);
            include($templateFile);
            return ob_end_flush();
        }
        else
        {
            throw new \Exceptions\TemplateEngineFileException("File does not exist: '$templateFile'");
        }
    }
    

}