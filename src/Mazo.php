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

  /**
   * Devuelve TRUE si el mazo esta vacio y FALSE en caso de que no.
   *
   * @return bool
   */
  
  public function esVacio() {
    return empty( $this->array );
  }

  /**
   * Agrega un carta al mazo con el numero y palo especificado. En el caso de que no sea
   * compatible con las cartas españolas y de poker, dicha carta no sera agregada.
   * 
   * @param int $numero
   * @param string $palo
   * 
   * @return bool
   * Si la carta no es compatible devuelve FALSE.
   *
   */

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

  /**
   * Reposiciona las cartas dentro del mazo de forma aleatoria.
   *
   * @return array
   */

  public function mezclar() {
    return shuffle( $this->array );
  }

  /**
   * Saca la carta que se encuentra en primera posicion del mazo y devuelve esa carta en caso de que el mazo no 
   * este vacio y FALSE en caso de que si.
   *
   * @return Carta, bool
   */

  public function sacar() {
    if ( $this->cant > 0 ) {
      $this->top = $this->array[ $this->cant-1 ];
      unset( $this->array[ $this->cant-1 ] );

      return $this->top;
    } else {
      return False;
    }
  }

  /**
   * A partir de un numero aleatorio que se encuentre entre 0 y la cantidad de cartas - 1, reingresa las cartas
   * al mazo dando el efecto de que este se corta.
   * 
   * @return bool
   * Una vez que termina el proceso devuelve TRUE.
   */

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

  /**
   * Devuelve la cantidad de cartas del mazo.
   * 
   * @return int
   */

  public function cantidad() {
    return $this->cant;
  }

  
  /**
   * Devuelve el array donde se almacenan las cartas
   * 
   * @return array
   */

  public function cartas() {
    return $this->array;
  }

  /**
   * Devuelve el tipo del mazo
   * 
   * @return string
   */

  public function tipo() {
    return $this->tipo;
  }

}
