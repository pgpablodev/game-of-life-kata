<?php

namespace Pablo\GameOfLifeKata;

class GameOfLife{
    private array $rules;

    public function __construct(private array $board){
        $this->rules = [
            new SurvivalRule(),
            new BirthRule(),
        ];
    }

    public function nextGen(): void{
        $nextBoard = $this->board;

        foreach($this->board as $row => $cells){
            foreach($cells as $column => $alive){
                $neighbours = $this->countLiveNeighbours($row, $column);
                $cell = new Cell($alive);

                $nextState = false;

                foreach ($this->rules as $rule) {
                    if ($rule->appliesTo($cell, $neighbours)) {
                        $nextState = $rule->nextState($cell, $neighbours);
                        break;
                    }
                }

                $nextBoard[$row][$column] = $nextState;
            }
        }

        $this->board = $nextBoard;
    }

    private function countLiveNeighbours(int $row, int $column): int{
        $count = 0;

        for($rowOffset = -1; $rowOffset <= 1; $rowOffset++){
            for($columnOffset = -1; $columnOffset <= 1; $columnOffset++){
                if($rowOffset === 0 && $columnOffset === 0){
                    continue;
                }

                $neighbourRow = $row + $rowOffset;
                $neighbourColumn = $column + $columnOffset;

                if($this->board[$neighbourRow][$neighbourColumn] ?? false){
                    $count++;
                }
            }
        }

        return $count;
    }

    public function board(): array{
        return $this->board;
    }
}