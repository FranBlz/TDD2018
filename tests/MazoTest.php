<?php

namespace TDD;

use PHPUnit\Framework\TestCase;

class MazoTest extends TestCase {

    public function testEsVacio() {
        $mazo = new Mazo;
        $this->assertTrue($mazo->esVacio());
        $mazo->agregar(1, "carta1");
        $this->assertFalse($mazo->esVacio());
    }

    public function testCantidad() {
        $mazo = new Mazo;
        $this->assertEquals($mazo->cantidad(), 0);
        $mazo->agregar(1, "carta1");
        $mazo->agregar(2, "carta2");
        $mazo->agregar(3, "carta3");
        $mazo->agregar(4, "carta4");
        $this->assertEquals($mazo->cantidad(), 4);
    }

    public function testSacar() {
        $mazo = new Mazo;
        $this->assertFalse($mazo->sacar());
        $mazo->agregar(1, "carta1");
        $mazo->agregar(2, "carta2");
        $mazo->agregar(3, "carta3");
        $mazo->agregar(4, "carta4");
        $this->assertEquals($mazo->sacar()->palo(), "carta4");
    }

    public function testMezclar() {
        $mazo = new Mazo;
        $mazo->agregar(1, "carta1");
        $mazo->agregar(2, "carta2");
        $mazo->agregar(3, "carta3");
        $mazo->agregar(4, "carta4");
        $mazo2 = new Mazo;
        $mazo2->agregar(1, "carta1");
        $mazo2->agregar(2, "carta2");
        $mazo2->agregar(3, "carta3");
        $mazo2->agregar(4, "carta4");
        $this->assertTrue($mazo->mezclar());
        #$this->assertNotEquals($mazo->sacar(), "carta4");  No se si poner este test porque es al azar
        $this->assertNotEquals($mazo->cartas(), $mazo2->cartas());
    }

    public function testCortar() {
        $mazo = new Mazo;
        $this->assertNotTrue($mazo->cortar());
        $mazo->agregar(1, "carta1");
        $mazo->agregar(2, "carta2");
        $mazo->agregar(3, "carta3");
        $mazo->agregar(4, "carta4");
        $this->assertTrue($mazo->cortar());
    }

    public function testExiste() {
        $mazo = new Mazo;
        $this->assertTrue(isset($mazo));
    }

    public function testClaseCarta() {
        $mazo = new Mazo;
        $mazo->agregar(3, "Oro");
        $mazo->agregar(5, "Copa");
        $mazo->agregar(6, "Espada");
        $this->assertEquals($mazo->sacar()->palo(), "Espada");
    }
}
