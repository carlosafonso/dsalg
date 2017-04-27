<?php

namespace Afonso\Dsalg;

/**
 * A comparator of scalar values.
 */
class ScalarComparator implements ComparatorInterface
{
    public function compare($a, $b)
    {
        return $a <=> $b;
    }
}
