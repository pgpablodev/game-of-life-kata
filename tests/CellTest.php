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

    public function test_alive_cell_can_become_dead(): void{
        $cell = new Cell(true);

        $cell->toggleState();

        $this->assertFalse($cell->isAlive());
    }

    public function test_dead_cell_can_become_alive(): void{
        $cell = new Cell(false);

        $cell->toggleState();

        $this->assertTrue($cell->isAlive());
    }
}