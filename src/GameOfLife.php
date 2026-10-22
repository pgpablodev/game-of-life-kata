<?php

namespace Pablo\GameOfLifeKata;

class GameOfLife{
    public function __construct(
        private array $board
    ) {
    }

    public function nextGen(): void{
        $nextBoard = $this->board;

        foreach($this->board as $row => $cells){
            foreach($cells as $column => $alive){
                $neighbours = $this->countLiveNeighbours($row, $column);

                if ($alive && $neighbours >= 2 && $neighbours <= 3) {
                    $nextBoard[$row][$column] = true;
                } else {
                    $nextBoard[$row][$column] = false;
                }
            }
        }

        $this->board = $nextBoard;
    }

    public function board(): array{
        return $this->board;
    }

    private function countLiveNeighbours(int $row, int $column): int{
        $count = 0;

        for ($rowOffset = -1; $rowOffset <= 1; $rowOffset++) {
            for ($columnOffset = -1; $columnOffset <= 1; $columnOffset++) {
                if ($rowOffset === 0 && $columnOffset === 0) {
                    continue;
                }

                $neighbourRow = $row + $rowOffset;
                $neighbourColumn = $column + $columnOffset;

                if ($this->board[$neighbourRow][$neighbourColumn] ?? false) {
                    $count++;
                }
            }
        }

        return $count;
    }
}