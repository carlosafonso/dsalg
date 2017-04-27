<?php

namespace Afonso\Dsalg;

/**
 * An interface for classes which sort arrays.
 */
interface SorterInterface
{
    /**
     * Sorts the given array using the provided comparator, and returns the
     * result.
     *
     * @param array $set
     * @param \Afonso\Dsalg\ComparatorInterface $comparator
     * @return array
     */
    public function sort(array $set, ComparatorInterface $comparator);
}
