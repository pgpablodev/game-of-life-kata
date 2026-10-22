<?php

namespace Pablo\GameOfLifeKata;

interface Rule{
    public function appliesTo(Cell $cell, int $liveNeighbours): bool;

    public function nextState(Cell $cell, int $liveNeighbours): bool;
}