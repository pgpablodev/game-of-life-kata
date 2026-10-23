<?php

namespace GameOfLifeKata\Tests;

use Pablo\GameOfLifeKata\Board;
use Pablo\GameOfLifeKata\Printer;
use Pablo\GameOfLifeKata\GameOfLife;
use Pablo\GameOfLifeKata\SurvivalRule;
use Pablo\GameOfLifeKata\BirthRule;
use PHPUnit\Framework\TestCase;

class PrinterTest extends TestCase{
    public function test_prints_live_and_dead_cells(): void{
        $board = new Board([
            [true, false],
            [false, true],
        ]);

        $printer = new Printer();

        $this->assertSame(
            "O.\n.O",
            $printer->print($board)
        );
    }

    public function test_prints_empty_board(): void{
        $board = new Board([]);

        $printer = new Printer();

        $this->assertSame('', $printer->print($board));
    }

    public function test_prints_horizontal_blinker(): void{
        $board = new Board([
            [false, false, false, false, false],
            [false, false, false, false, false],
            [false, true,  true,  true,  false],
            [false, false, false, false, false],
            [false, false, false, false, false],
        ]);

        $printer = new Printer();

        $this->assertSame(
            ".....\n.....\n.OOO.\n.....\n.....",
            $printer->print($board)
        );
    }

    public function test_prints_vertical_blinker_after_next_generation(): void{
        $board = new Board([
            [false, false, false, false, false],
            [false, false, false, false, false],
            [false, true,  true,  true,  false],
            [false, false, false, false, false],
            [false, false, false, false, false],
        ]);

        $game = new GameOfLife(
            $board,
            [
                new SurvivalRule(),
                new BirthRule(),
            ]
        );

        $game->nextGen();

        $printer = new Printer();

        $this->assertSame(
            ".....\n..O..\n..O..\n..O..\n.....",
            $printer->print(new Board($game->board()))
        );
    }
}