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

    public function getJogador($id,$query) {
        App::import("Model", "Jogador");
        $model = new Jogador();
        $information = $model->find("first",array(
        'conditions' => 
        array('Jogador.id' => $id)));
        return $information["Jogador"][$query];
    }

    public function getPosicaoJogador($posicao, $total) {
        // Use the HTML helper to output
        // formatted data:
        $glyphs = "";
        switch($posicao)
        {
            case 1:{
                $glyphs = "<i class='glyphicon glyphicon-star' style='color: #daa520;'></i>";
                break;
            }
            case 2:{
                $glyphs = "<i class='glyphicon glyphicon-star' style='color: #c0c0c0;'></i>";
                break;
            }
            case 3:{
                $glyphs = "<i class='glyphicon glyphicon-star' style='color: #CD7F32;'></i>";
                break;
            }
            case $total-2:{
                $glyphs = "<i class='glyphicon glyphicon-circle-arrow-down' style='color: #FF6600;'></i>";
                break;
            }
            case $total-1:{
                $glyphs = "<i class='glyphicon glyphicon-circle-arrow-down' style='color: #FF3300;'></i>";
                break;
            }
            case $total:{
                $glyphs = "<i class='glyphicon glyphicon-circle-arrow-down' style='color: #FF0000;'></i>";
                break;
            }
        }
        return $glyphs;
    }
}
?>