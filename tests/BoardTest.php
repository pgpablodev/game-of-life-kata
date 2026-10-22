<?php

namespace GameOfLifeKata\Tests;

use Pablo\GameOfLifeKata\Board;
use PHPUnit\Framework\TestCase;

class BoardTest extends TestCase{
    public function test_board_contains_cells_with_the_initial_state(): void{
        $board = new Board([
            [false, true],
            [true, false],
        ]);

        $this->assertFalse($board->cellAt(0, 0)->isAlive());
        $this->assertTrue($board->cellAt(0, 1)->isAlive());
        $this->assertTrue($board->cellAt(1, 0)->isAlive());
        $this->assertFalse($board->cellAt(1, 1)->isAlive());
    }
}