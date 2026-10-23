<?php

namespace GameOfLifeKata\Tests;

use Pablo\GameOfLifeKata\Board;
use Pablo\GameOfLifeKata\Cell;
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

    public function test_can_check_if_a_cell_is_alive(): void{
        $board = new Board([
            [false, true],
            [true, false],
        ]);

        $this->assertFalse($board->isAliveAt(0, 0));
        $this->assertTrue($board->isAliveAt(0, 1));
    }

    public function test_cell_outside_board_is_not_alive(): void{
        $board = new Board([
            [true, false],
            [false, true],
        ]);

        $this->assertFalse($board->isAliveAt(-1, 0));
        $this->assertFalse($board->isAliveAt(0, 2));
    }

    public function test_counts_live_neighbours(): void{
        $board = new Board([
            [true, false, true],
            [false, true, false],
            [true, false, false],
        ]);

        $this->assertSame(3, $board->countLiveNeighbours(1, 1));
    }

    public function test_counts_live_neighbours_at_board_corner(): void{
        $board = new Board([
            [true, true],
            [false, true],
        ]);

        $this->assertSame(2, $board->countLiveNeighbours(0, 0));
    }

    public function test_returns_board_state_as_boolean_array(): void{
        $board = new Board([
            [false, true],
            [true, false],
        ]);

        $this->assertSame([
            [false, true],
            [true, false],
        ], $board->toArray());
    }
}