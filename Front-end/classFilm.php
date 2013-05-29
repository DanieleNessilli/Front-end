<?php                                  //classe che crea l'oggetto film
class classFilm{
	var $titolo;
	var $regia;
	var  $attore;
	var $trailer;
	var $descrizione;
	var $locandina;
	
	
	public function setTitolo($tit){
	     $this->titolo=$tit;                     
	}
	public function getTitolo(){
		return $this->titolo;
	}
	public function setRegia($reg){
		$this->regia=$reg;
	}
	public function getRegia(){
		return $this->regia;
	}
	public function setAttore($att){
		$this->attore=$att;
	}
	public function getAttore(){
		return $this->attore;
	}
	public function setDescrizione($descr){
		$this->descrizione=$descr;
	}
	public function getDescrizione(){
		return $this->descrizione;
	}
	public function setTrailer($trail){
		$this->trailer=$trail;
	}
	public function getTrailer(){
		return $this->trailer;
	}
	public function setLocandina($loc){
		$this->locandina=$loc;
	}
	public function getLocandina(){
		return $this->locandina;
	}
	
}