<?php

namespace Afonso\Dsalg;

/**
 * An interface for classes which perform comparisons between arbitrary
 * entities.
 */
interface ComparatorInterface
{
    /**
     * Compares two arbitrary objects.
     *
     * Implementations of this method are expected to return 1 if $a is greater
     * than $b, -1 if $a is less than $b and 0 if $a and $b are equal.
     *
     * @param mixed $a
     * @param mixed $b
     * @return int
     */
    public function compare($a, $b);
}
