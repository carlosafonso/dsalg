<?php

namespace Afonso\Sorting;

/**
 * A sorter implementing the Quicksort algorithm.
 *
 * This class falls back to PHP's native sorting functions, as they already
 * implement Quicksort.
 */
class Quicksort implements SorterInterface
{
    public function sort(array $set, ComparatorInterface $comparator)
    {
        $a = $set;  // don't modify the original array
        $comparisonFn = function ($a, $b) use ($comparator) {
            return $comparator->compare($a, $b);
        };
        uasort($set, $comparisonFn);
        return $set;
    }
}
