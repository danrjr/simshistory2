<?php

namespace app\models;

class CategoriaSecundaria
{
    private $id;
    private $titulo;
    private $foto;
    private $categoria_id;

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getFoto(){
		return $this->foto;
	}

	public function setFoto($foto){
		$this->foto = $foto;
	}

	public function getCategoria_id(){
		return $this->categoria_id;
	}

	public function setCategoria_id($categoria_id){
		$this->categoria_id = $categoria_id;
	}
}