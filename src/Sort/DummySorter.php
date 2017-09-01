<?php

namespace Afonso\Dsalg\Sort;

use Afonso\Dsalg\ComparatorInterface;

/**
 * A dummy sorter which returns the same set that it is given.
 */
class DummySorter implements SorterInterface
{
    public function sort(array $set, ComparatorInterface $comparator)
    {
        return $set;
    }
}
