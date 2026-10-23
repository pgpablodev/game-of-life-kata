<?php

namespace Pablo\GameOfLifeKata;

class GameOfLife{
    private array $rules;

    public function __construct(private Board $board){
        $this->rules = [
            new SurvivalRule(),
            new BirthRule(),
        ];
    }

    public function nextGen(): void{
        $currentBoard = $this->board->toArray();
        $nextBoard = [];

        foreach ($currentBoard as $row => $cells) {
            foreach ($cells as $column => $alive) {
                $neighbours = $this->board->countLiveNeighbours($row, $column);
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

        $this->board = new Board($nextBoard);
    }

    public function board(): array{
        return $this->board->toArray();
    }
}