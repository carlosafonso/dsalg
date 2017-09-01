<?php

namespace Afonso\Dsalg\Tests;

use Afonso\Dsalg\Set\CappedOrderedSet;
use PHPUnit\Framework\TestCase;

class CappedOrderedSetTest extends TestCase
{
    public function testSetKeepingHighs()
    {
        $set = new CappedOrderedSet(4, CappedOrderedSet::KEEP_HIGH);
        $set->add(10);
        $set->add(4);
        $set->add(13);
        $set->add(25);
        $set->add(21);
        $set->add(20);
        $set->add(2);
        $set->add(21);

        $this->assertEquals([20, 21, 21, 25], $set->all());
    }

    public function testSetKeepingLows()
    {
        $set = new CappedOrderedSet(4, CappedOrderedSet::KEEP_LOW);
        $set->add(10);
        $set->add(4);
        $set->add(13);
        $set->add(25);
        $set->add(21);
        $set->add(20);
        $set->add(2);
        $set->add(21);

        $this->assertEquals([2, 4, 10, 13], $set->all());
    }

    public function testSetKeepsHighsByDefault()
    {
        $set = new CappedOrderedSet(4);
        $set->add(10);
        $set->add(4);
        $set->add(13);
        $set->add(25);
        $set->add(21);
        $set->add(20);
        $set->add(2);
        $set->add(21);

        $this->assertEquals([20, 21, 21, 25], $set->all());

        $set = new CappedOrderedSet(4, 'this is wrong');
        $set->add(10);
        $set->add(4);
        $set->add(13);
        $set->add(25);
        $set->add(21);
        $set->add(20);
        $set->add(2);
        $set->add(21);

        $this->assertEquals([20, 21, 21, 25], $set->all());
    }
}
