<?php

namespace Pablo\GameOfLifeKata;

class Board{
    private array $cells = [];

    public function __construct(array $initialState){
        foreach ($initialState as $rowIndex => $row){
            foreach ($row as $columnIndex => $alive){
                $this->cells[$rowIndex][$columnIndex] = new Cell($alive);
            }
        }
    }

    public function cellAt(int $row, int $column): Cell{
        return $this->cells[$row][$column];
    }

    public function isAliveAt(int $row, int $column): bool{
        if(!isset($this->cells[$row][$column])){
            return false;
        }

        return $this->cells[$row][$column]->isAlive();
    }

    public function countLiveNeighbours(int $row, int $column): int
    {
        $count = 0;

        for ($rowOffset = -1; $rowOffset <= 1; $rowOffset++) {
            for ($columnOffset = -1; $columnOffset <= 1; $columnOffset++) {
                if ($rowOffset === 0 && $columnOffset === 0) {
                    continue;
                }

                $neighbourRow = $row + $rowOffset;
                $neighbourColumn = $column + $columnOffset;

                if ($this->isAliveAt($neighbourRow, $neighbourColumn)) {
                    $count++;
                }
            }
        }

        return $count;
    }

    public function toArray(): array{
        $state = [];

        foreach ($this->cells as $rowIndex => $row) {
            foreach ($row as $columnIndex => $cell) {
                $state[$rowIndex][$columnIndex] = $cell->isAlive();
            }
        }

        return $state;
    }
}