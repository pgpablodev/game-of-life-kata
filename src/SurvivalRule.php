<?php

namespace Pablo\GameOfLifeKata;

class SurvivalRule implements Rule{
    public function appliesTo(Cell $cell, int $liveNeighbours): bool{
        return $cell->isAlive() && ($liveNeighbours === 2 || $liveNeighbours === 3);
    }

    public function nextState(Cell $cell, int $liveNeighbours): bool{
        return true;
    }
}