<?php

namespace TDD;

use PHPUnit\Framework\TestCase;

class MazoTest extends TestCase {

    public function testEsVacio() {
        $mazo = new Mazo("español");
        $this->assertTrue($mazo->esVacio());
        $mazo->agregar("1", "espada");
        $this->assertFalse($mazo->esVacio());
    }

    public function testCantidad() {
        $mazo = new Mazo("español");
        $this->assertEquals($mazo->cantidad(), 0);
        $mazo->agregar("1", "espada");
        $mazo->agregar("2", "espada");
        $mazo->agregar("3", "espada");
        $mazo->agregar("4", "espada");
        $this->assertEquals($mazo->cantidad(), 4);
    }

    public function testSacar() {
        $mazo = new Mazo("español");
        $this->assertFalse($mazo->sacar());
        $mazo->agregar("1", "espada");
        $mazo->agregar("2", "espada");
        $mazo->agregar("3", "espada");
        $mazo->agregar("4", "espada");
        $this->assertEquals($mazo->sacar()->palo(), "espada");
    }

    public function testMezclar() {
        $mazo = new Mazo("español");
        $mazo->agregar("1", "espada");
        $mazo->agregar("2", "espada");
        $mazo->agregar("3", "espada");
        $mazo->agregar("4", "espada");
        $mazo2 = new Mazo("español");
        $mazo->agregar("1", "espada");
        $mazo->agregar("2", "espada");
        $mazo->agregar("3", "espada");
        $mazo->agregar("4", "espada");
        $this->assertTrue($mazo->mezclar());
        #$this->assertNotEquals($mazo->sacar(), "carta4");  No se si poner este test porque es al azar
        $this->assertNotEquals($mazo->cartas(), $mazo2->cartas());
    }

    public function testCortar() {
        $mazo = new Mazo("español");
        $this->assertNotTrue($mazo->cortar());
        $mazo->agregar("1", "espada");
        $mazo->agregar("2", "espada");
        $mazo->agregar("3", "espada");
        $mazo->agregar("4", "espada");
        $this->assertTrue($mazo->cortar());
    }

    public function testExiste() {
        $mazo = new Mazo("español");
        $this->assertTrue(isset($mazo));
    }

    public function testClaseCarta() {
        $mazo = new Mazo("español");
        $mazo->agregar("3", "oro");
        $mazo->agregar("5", "copa");
        $mazo->agregar("6", "espada");
	    $this->assertFalse($mazo->agregar("6", "jamon"));
	    $this->assertFalse($mazo->agregar("39", "oro"));
        $this->assertEquals($mazo->sacar()->palo(), "espada");
    }

    public function testTipoMazo() {
        $mazo = new Mazo("queso");
        $this->assertFalse($mazo->tipo());
        
        $mazo = new Mazo("poker");

        $this->assertEquals($mazo->tipo(), "poker");
        $this->assertFalse($mazo->agregar("6", "jamon"));

        $mazo->agregar("As", "corazones");
        $mazo->agregar("5", "picas");
        $mazo->agregar("2", "treboles");
        $this->assertEquals($mazo->cantidad(), 3);
    }

   
}
