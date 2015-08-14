<?php
App::uses('AppHelper', 'View/Helper');
class LinkHelper extends AppHelper {
    public $helpers = array('Html');

    public function converteData($data)
    {
        $time = strtotime($data);
        $dataFormatada = date("d/m/y - G:i:s", $time);
        return $dataFormatada;
    }

    public function converteDataSemHora($data)
    {
        $time = strtotime($data);
        $dataFormatada = date("d/m/y", $time);
        return $dataFormatada;
    }

    public function getTipo($cat)
    {
        switch ($cat) {
            case 0:
                $type = "Free Rool";
                break;
            case 1:
                $type = "Deep";
                break;
            case 2:
                $type = "Cash Game";
                break;
            case 3:
                $type = "Micro stack";
                break;
            case 4:
                $type = "Sit go";
                break;
            case 5:
                $type = "Home Game";
                break;
            default:
               $type = "is not a type";
        }
        return $type;
    }

    public function getUsuario($id,$query) {
        App::import("Model", "Usuario");
        $model = new Usuario();
        $information = $model->find("first",array(
        'conditions' => 
        array('Usuario.id' => $id)));
        return $information["Usuario"][$query];
    }

    public function getPrioridade($prioridade) {
        // Use the HTML helper to output
        // formatted data:
        $glyphs = "";
        switch($prioridade)
        {
            case 1:{
                $glyphs = "<i class='glyphicon glyphicon-flag' style='color: #daa520;'></i>";
                break;
            }
            case 2:{
                $glyphs = "<i class='glyphicon glyphicon-flag' style='color: #c0c0c0;'></i>";
                break;
            }
            case 3:{
                $glyphs = "<i class='glyphicon glyphicon-flag' style='color: #CD7F32;'></i>";
                break;
            }
            default:{
                $glyphs = "";
                break;
            }
        }
        return $glyphs;
    }    
}
?>