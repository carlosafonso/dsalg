<?php

namespace Afonso\Sorting;

/**
 * A comparator of numbers.
 */
class NumberComparator implements ComparatorInterface
{
    public function compare($a, $b)
    {
        return $a > $b ? 1 : (($a < $b) ? -1 : 0);
    }
}
