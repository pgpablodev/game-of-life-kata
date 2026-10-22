<?php

namespace Pablo\GameOfLifeKata;

class Cell{
    public function __construct(private bool $alive){}

    public function isAlive(): bool{
        return $this->alive;
    }
}