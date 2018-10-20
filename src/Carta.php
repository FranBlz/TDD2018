<?php

namespace TDD;

class Carta {

    protected $palo;
    protected $numero;

    public function __construct($numero = 0, $palo = "") {
        $this->palo = $palo;
        $this->numero = $numero;
    }

    public function palo() {
        return $this->palo;
    }

    public function numero() {
        return $this->numero;
    }

}