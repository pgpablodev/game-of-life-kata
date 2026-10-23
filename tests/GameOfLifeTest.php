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

    public function test_dead_cell_with_three_live_neighbours_becomes_alive(): void{
        $game = new GameOfLife([
            [true,  true,  true],
            [false, false, false],
            [false, false, false],
        ]);

        $game->nextGen();

        $this->assertTrue($game->board()[1][1]);
    }

    
    public function test_alive_cell_with_one_live_neighbour_dies(): void{
        $game = new GameOfLife([
            [false, false, false],
            [true, true, false],
            [false, false, false],
        ]);

        $game->nextGen();

        $this->assertFalse($game->board()[1][0]);
    }

    public function test_alive_cell_with_four_live_neighbours_dies(): void{
        $game = new GameOfLife([
            [true, false, true],
            [false, true, false],
            [true, false, true],
        ]);

        $game->nextGen();

        $this->assertFalse($game->board()[1][1]);
    }

    public function test_dead_cell_with_two_live_neighbours_stays_dead(): void{
        $game = new GameOfLife([
            [true, true, false],
            [false, false, false],
            [false, false, false],
        ]);

        $game->nextGen();

        $this->assertFalse($game->board()[1][1]);
    }

    //Blinker behaviour tests

    public function test_horizontal_blinker_becomes_vertical(): void{
        $game = new GameOfLife([
            [false, false, false, false, false],
            [false, false, false, false, false],
            [false, true, true, true, false],
            [false, false, false, false, false],
            [false, false, false, false, false],
        ]);

        $game->nextGen();

        $this->assertSame([
            [false, false, false, false, false],
            [false, false, true, false, false],
            [false, false, true, false, false],
            [false, false, true, false, false],
            [false, false, false, false, false],
        ], $game->board());
    }

    public function test_blinker_returns_to_horizontal_after_two_generations(): void{
        $game = new GameOfLife([
            [false, false, false, false, false],
            [false, false, false, false, false],
            [false, true, true, true, false],
            [false, false, false, false, false],
            [false, false, false, false, false],
        ]);

        $game->nextGen();
        $game->nextGen();

        $this->assertSame([
            [false, false, false, false, false],
            [false, false, false, false, false],
            [false, true, true, true, false],
            [false, false, false, false, false],
            [false, false, false, false, false],
        ], $game->board());
    }

    public function test_cell_in_corner_dies_when_it_has_no_live_neighbours(): void{
        $game = new GameOfLife([
            [true, false, false],
            [false, false, false],
            [false, false, false],
        ]);

        $game->nextGen();

        $this->assertFalse($game->board()[0][0]);
        $this->assertSame(3, count($game->board()));
        $this->assertSame(3, count($game->board()[0]));
    }
}