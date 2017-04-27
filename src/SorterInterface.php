<?php

namespace Afonso\Sorting;

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
     * @param \Afonso\Sorting\ComparatorInterface $comparator
     * @return array
     */
    public function sort(array $set, ComparatorInterface $comparator);
}
