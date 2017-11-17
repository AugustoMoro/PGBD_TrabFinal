<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Editor
 *
 * @author morov
 */
class Editor {
    var $idEditor;
    var $editorNome;
    
    function __construct() {
        
    }
    
    function getIdEditor() {
        return $this->idEditor;
    }

    function getEditorNome() {
        return $this->editorNome;
    }

    function setIdEditor($idEditor) {
        $this->idEditor = $idEditor;
    }

    function setEditorNome($editorNome) {
        $this->editorNome = $editorNome;
    }
}
