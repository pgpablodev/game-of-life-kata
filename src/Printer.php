<?php

namespace Pablo\GameOfLifeKata;

class Printer{
    public function print(Board $board): string{
        $lines = [];

        foreach($board->toArray() as $row){
            $line = '';

            foreach($row as $alive){
                $line .= $alive ? 'O' : '.';
            }

            $lines[] = $line;
        }

        return implode("\n", $lines);
    }
}