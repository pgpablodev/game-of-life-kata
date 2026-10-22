<?php

namespace Pablo\GameOfLifeKata\Tests;

use Pablo\GameOfLifeKata\Cell;
use Pablo\GameOfLifeKata\SurvivalRule;
use PHPUnit\Framework\TestCase;

class SurvivalRuleTest extends TestCase{
    public function test_applies_to_alive_cell_with_two_neighbours(): void{
        $rule = new SurvivalRule();

        $this->assertTrue(
            $rule->appliesTo(new Cell(true), 2)
        );
    }

    public function test_does_not_apply_to_dead_cell(): void{
        $rule = new SurvivalRule();

        $this->assertFalse(
            $rule->appliesTo(new Cell(false), 2)
        );
    }

    public function test_does_not_apply_to_alive_cell_with_one_neighbour(): void{
        $rule = new SurvivalRule();

        $this->assertFalse(
            $rule->appliesTo(new Cell(true), 1)
        );
    }
}