<?php
App::uses('File', 'Utility');

class JogoAgoraController extends AppController
{
    public function ver() 
    {        
        $file = new File(WWW_ROOT.'files'.DS.'jogoagora.txt');
        $contents = $file->read();
        $file->close();
        $this->set('videoID', $contents);        
	}

    public function editar($idVideo=NULL) 
    {   
        if(AuthComponent::user('privilegio') == 1&&$idVideo!=NULL)
        {
            $file = new File(WWW_ROOT.'files'.DS.'jogoagora.txt');
            $file->write($idVideo);
            $file->close();
        }
    }
}
?>