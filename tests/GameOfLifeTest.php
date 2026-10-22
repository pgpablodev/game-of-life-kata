<?php

namespace Pablo\GameOfLifeKata\Tests;

use Pablo\GameOfLifeKata\GameOfLife;
use PHPUnit\Framework\TestCase;

class GameOfLifeTest extends TestCase{
    public function test_isolated_alive_cell_dies_in_next_generation(): void{
        $game = new GameOfLife([
            [false, false, false],
            [false, true, false],
            [false, false, false],
        ]);

        $game->nextGen();

        $this->assertFalse($game->board()[1][1]);
    }

    
    public function test_alive_cell_with_two_live_neighbours_survives(): void{
        $game = new GameOfLife([
            [false, false, false],
            [true, true, true],
            [false, false, false],
        ]);

        $game->nextGen();

        $this->assertTrue($game->board()[1][1]);
    }
}