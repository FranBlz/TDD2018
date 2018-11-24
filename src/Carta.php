<?php

namespace TDD;

class Carta {

    protected $palo;
    protected $numero;

    public function __construct( $numero = "0", $palo = "" ) {
        $this->palo = $palo;
        $this->numero = $numero;
    }

    /**
     * Devuelve el palo de la carta.
     *
     * @return string
     */

    public function palo() {
        return $this->palo;
    }

    /**
     * Devuelve el numero de la carta.
     *
     * @return int
     */


    public function numero() {
        return $this->numero;
    }

}
