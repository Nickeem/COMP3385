<?php
namespace Utility;

final class FormGenerator {
    private $formAttributes = [];
    private $fields = [];
    private $html = "";

    public function addAttribute($name, $value) {
        $this->formAttributes[$name] = $value;
    }

    public function addField($type, $name, $label, $attributes = [], $isRequired=false) {
        $field = [
            'type' => $type,
            'name' => $name,
            'label' => $label,
            'attributes' => $attributes,
            'required'=> $isRequired
        ];

        $this->fields[] = $field;
    }



    public function generateForm() {
        $html = "<form";
    
        foreach ($this->formAttributes as $name => $value) {
            $html .= " $name=\"$value\"";
        }
    
        $html .= ">";
    
        foreach ($this->fields as $field) {
            $html .= "<label for=\"". $field['name']. "\">".$field['label']."</label>";
    
            $html .= "<input type=\"".$field['type']."\" name=\"".$field['name']."\"";
    
            foreach ($field['attributes'] as $attrName => $attrValue) {
                $html .= " $attrName='$attrValue' ";
            }
            if ($field['required']) {
                $html .= " required";
            }
    
            $html .= "><br>";
        }
    
        $html .= "<input type=\"submit\" value=\"Submit\"></form>";
    
        return $html;
    }

    public function saveForm($fileName, $filePath)
    {
        
    }

}