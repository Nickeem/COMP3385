<?php
namespace Utility;

final class FormGenerator {
    private $formAttributes = [];
    private $fields = [];

    public function addAttribute($name, $value) {
        $this->formAttributes[$name] = $value;
    }

    public function addField($type, $name, $label, $attributes = []) {
        $field = [
            'type' => $type,
            'name' => $name,
            'label' => $label,
            'attributes' => $attributes,
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
    
            $html .= "><br>";
        }
    
        $html .= "<input type=\"submit\" value=\"Submit\"></form>";
    
        return $html;
    }

}