<?php

namespace Afonso\Sorting;

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
