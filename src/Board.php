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
}