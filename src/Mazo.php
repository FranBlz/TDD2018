<?php

namespace TDD;

class Mazo {

  protected $array = [];
  protected $cant = 0;
  protected $top;

  public function esVacio() {
    return empty($this->array);
  }

  public function agregar($numero, $palo) {
    $carta = new Carta($numero, $palo);
    $this->array[] = $carta;
    $this->cant += 1;
  }

  public function mezclar() {
    return shuffle($this->array);
  }

  public function sacar() {
    if($this->cant > 0) {
      $this->top = $this->array[$this->cant-1];
      unset($this->array[$this->cant-1]);

      return $this->top;
    }
    else {
      return False;
    }
  }

  public function cortar() {
    if($this->cant > 0) {
      $myRand = rand(0, $this->cant-1);
      $i = 0;

      for($i = 0; $i <= $myRand; $i += 1) {
        $tmp = $this->array[$i];
        unset($this->array[$i]);
        $this->agregar($tmp->numero(),$tmp->palo());
      }
      return True;
    }
  }

  public function cantidad() {
    return $this->cant;
  }

  public function cartas() { # Esta funcion es empleada para el testeo de la funcion mezclar
    return $this->array;
  }

}
