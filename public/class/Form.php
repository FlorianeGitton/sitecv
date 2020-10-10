<?php

class Form {

    private $datas = [];

    public function __construct($datas = []){
        $this->datas = $datas;
    }

    private function getValue($name){

        $value = "";

        if(isset($this->datas[$name])){
            return $this->datas[$name];
        }else{
           return '';
        }
    }

    private function input($type, $name, $label){
        
        $value = $this->getValue($name);

        if($type == 'textarea'){

            $input = "<textarea required name=\"$name\" id=\"input$name\"></textarea>";

        }else{

            $input = "<input required type=\"$type\" name=\"$name\" id=\"input$name\" value=\"\">";
        }
        
        

        return "<div class=\"form\">
                        <label for=\"input$name\">Votre $label</label>
                        $input
                    </div>";
    }

    public function text($name, $label){

         return $this->input('text', $name, $label);
    }

    public function email($name, $label){

        return $this->input('email', $name, $label);
    }

    public function textarea($name, $label){

        return $this->input('textarea', $name, $label);
    }
}