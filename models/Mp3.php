<?php

class Mp3 extends Tracks{
    private $formato;

    function __construct($id, $nombre, $formato){
        parent::__construct($id, $nombre, $formato);
        $this->formato=$formato;
    }

    public function getFormato()
    {
        if ($this->formato==0){
            return "Mp3";
        }else{
            return "Ogg";
        }
        
    }
}