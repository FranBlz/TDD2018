<?php

namespace TDD;

use PHPUnit\Framework\TestCase;

class CartaTest extends TestCase {

    public function testPalo() {
        $carta = New Carta("1", "espada");
        $this->assertEquals($carta->palo(), "espada");
    }

    public function testNumero() {
        $carta = New Carta("11", "basto");
        $this->assertEquals($carta->numero(), "11");
    }

}
