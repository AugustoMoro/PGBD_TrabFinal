<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author morov
 */
interface IEditorDAO {
    public function __construct();
    public function getEditorByIdJogo($nosql,$idJogo);
    public function getEditorByIdEd($nosql,$idEd);
    public function getTodosEditores($nosql);
}
