<?php

namespace Afonso\Dsalg\Tests;

use Afonso\Dsalg\ScalarComparator;
use PHPUnit\Framework\TestCase;

class ScalarComparatorTest extends TestCase
{
    protected $comparator;

    protected function setUp()
    {
        parent::setUp();
        $this->comparator = new ScalarComparator();
    }

    public function testCompareNumericValues()
    {
        $this->assertEquals(-1, $this->comparator->compare(10, 20));
        $this->assertEquals(1, $this->comparator->compare(20, 10));
        $this->assertEquals(0, $this->comparator->compare(20, 20));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCompareAnObject()
    {
        $this->comparator->compare(10, new \stdClass());
    }
}
