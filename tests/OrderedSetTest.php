<?php

namespace Afonso\Dsalg\Tests;

use Afonso\Dsalg\Set\OrderedSet;
use PHPUnit\Framework\TestCase;

class OrderedSetTest extends TestCase
{
    public function testSet()
    {
        $set = new OrderedSet;
        $set->add(10);
        $set->add(4);
        $set->add(13);
        $set->add(25);
        $set->add(21);
        $set->add(20);
        $set->add(2);
        $set->add(21);

        $this->assertEquals([2, 4, 10, 13, 20, 21, 21, 25], $set->all());
    }

    public function testSetWithCustomComparisonFunction()
    {
        $compareFn = function ($a, $b) {
            if ($a > $b) {
                return -1;
            }
            if ($a < $b) {
                return 1;
            }
            return 0;
        };

        $set = new OrderedSet($compareFn);
        $set->add(10);
        $set->add(4);
        $set->add(13);
        $set->add(25);
        $set->add(21);
        $set->add(20);
        $set->add(2);
        $set->add(21);

        $this->assertEquals([25, 21, 21, 20, 13, 10, 4, 2], $set->all());
    }

    public function testSetWithCustomComparisonFunctionAndCustomObjects()
    {
        $foos = [
            (object) (['bar' => 4]),
            (object) (['bar' => 8]),
            (object) (['bar' => 2]),
            (object) (['bar' => 5])
        ];

        $compareFn = function ($a, $b) {
            if ($a->bar > $b->bar) {
                return 1;
            }
            if ($a->bar < $b->bar) {
                return -1;
            }
            return 0;
        };

        $set = new OrderedSet($compareFn);

        foreach ($foos as $foo) {
            $set->add((object) $foo);
        }


        $this->assertEquals([$foos[2], $foos[0], $foos[3], $foos[1]], $set->all());
    }
}
