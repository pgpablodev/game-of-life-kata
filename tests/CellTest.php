<?php

namespace Pablo\GameOfLifeKata\Tests;

use Pablo\GameOfLifeKata\Cell;
use PHPUnit\Framework\TestCase;

class CellTest extends TestCase{
    public function test_cell_can_be_created_alive(): void{
        $cell = new Cell(true);

        $this->assertTrue($cell->isAlive());
    }

    public function test_cell_can_be_created_dead(): void{
        $cell = new Cell(false);

        $this->assertFalse($cell->isAlive());
    }
}