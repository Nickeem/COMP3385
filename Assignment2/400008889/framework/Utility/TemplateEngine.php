<?php
namespace Utility;
include_once 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';

final class TemplateEngine {
    private $templateData;
    private $templatePath;

    public function __construct($templatePath) {
        $this->templatePath = $templatePath;
    }
    
    public function setTemplatePath($templatePath) {
        $this->templatePath = $templatePath;
    }
    public function getTemplatePath() {
        return $this->templatePath;
    }

    public function assign($name, $value) 
    {
        $this->templateData[$name] = $value;
    }

    public function render($templateFile)
    {
        if (file_exists($this->templatePath + $templateFile))
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