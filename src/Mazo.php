<?php

namespace TDD;
use Exception;

class Mazo {

  protected $array = [ ];
  protected $cant = 0;
  protected $top;

  protected $tipo;
  protected $arrayTipoP = [ ];
  protected $arrayTipoN = [ ];
  protected $pokerP = array( "corazones", "picas", "treboles", "diamantes" );
  protected $pokerN  = array( "As", "2", "3", "4", "5", "6", "7", "8", "9", "J", "K", "Q" );
  protected $espP = array( "oro", "espada", "basto", "copa" );
  protected $espN  = array( "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12" );
  
  public function __construct($tipo) {
    $this->tipo = $tipo;
    if($this->tipo == "español"){
      $this->arrayTipoP = $this->espP;
      $this->arrayTipoN = $this->espN;
    }
    else if($this->tipo == "poker") {
      $this->arrayTipoP = $this->pokerP;
      $this->arrayTipoN = $this->pokerN;
    }
    else {
      $this->tipo = false;
    }
  }

  public function esVacio() {
    return empty( $this->array );
  }

  public function agregar( $numero, $palo ) {
  	if( (in_array($numero, $this->arrayTipoN) && in_array($palo, $this->arrayTipoP))) {
  		$carta = new Carta( $numero, $palo );
   	 	$this->array[ ] = $carta;
    		$this->cant += 1;
  	}
    else {
      return False;
    }
  }

  public function mezclar() {
    return shuffle( $this->array );
  }

  public function sacar() {
    if ( $this->cant > 0 ) {
      $this->top = $this->array[ $this->cant-1 ];
      unset( $this->array[ $this->cant-1 ] );

      return $this->top;
    } else {
      return False;
    }
  }

  public function cortar() {
    if ( $this->cant > 0 ) {
      $myRand = rand( 0, $this->cant-1 );
      $i = 0;

      for ( $i = 0; $i <= $myRand; $i += 1 ) {
        $tmp = $this->array[ $i ];
        unset( $this->array[ $i ] );
        $this->agregar( $tmp->numero(), $tmp->palo() );
      }
      return TRUE;
    }
  }

  public function cantidad() {
    return $this->cant;
  }

  public function cartas() {
# Esta funcion es empleada para el testeo de la funcion mezclar
    return $this->array;
  }

  public function tipo() {
    return $this->tipo;
  }

}
