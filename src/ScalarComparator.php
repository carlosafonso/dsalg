<?php

namespace Afonso\Dsalg;

use InvalidArgumentException;

/**
 * A comparator of scalar values.
 */
class ScalarComparator implements ComparatorInterface
{
    public function compare($a, $b)
    {
        if (! is_numeric($a) || ! is_numeric($b)) {
            throw new InvalidArgumentException("Arguments are not scalar");
        }
        return $a <=> $b;
    }
}
