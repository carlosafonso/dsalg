<?php

namespace Afonso\Dsalg\Sort;

use Afonso\Dsalg\ComparatorInterface;

/**
 * A sorter implementing the Heapsort algorithm.
 */
class Heapsort implements SorterInterface
{
    public function sort(array $set, ComparatorInterface $comparator)
    {
        $count = count($set);
        $end = $count - 1;

        $heap = $this->heapify($set, $comparator);

        while ($end > 0) {
            $tmpEnd = $heap[$end];
            $heap[$end] = $heap[0];
            $heap[0] = $tmpEnd;
            $end = $end - 1;
            $this->siftDown($heap, 0, $end, $comparator);
        }
        return $heap;
    }

    /**
     * Returns an array with the same items as the input array, but which
     * fulfills the heap property.
     *
     * @param array $a
     * @param \Afonso\Dsalg\ComparatorInterface $comparator
     * @return array
     */
    protected function heapify(array $a, ComparatorInterface $comparator)
    {
        $count = count($a);
        $start = $this->getParentIndex($count - 1);

        while ($start >= 0) {
            $this->siftDown($a, $start, $count - 1, $comparator);
            $start = $start - 1;
        }

        return $a;
    }

    protected function siftDown(array &$a, $start, $end, ComparatorInterface $comparator)
    {
        $root = $start;
        while (($child = $this->getLeftChildIndex($root)) <= $end) {
            $swap = $root;
            if ($comparator->compare($a[$swap], $a[$child]) < 0) {
                $swap = $child;
            }

            if ($child + 1 <= $end && $comparator->compare($a[$swap], $a[$child + 1]) < 0) {
                $swap = $child + 1;
            }

            if ($swap === $root) {
                return;
            }

            $tmpRoot = $a[$root];
            $a[$root] = $a[$swap];
            $a[$swap] = $tmpRoot;

            $root = $swap;
        }
    }

    /**
     * Returns the index of the parent node for the given index.
     *
     * @param int $i
     * @return int
     */
    protected function getParentIndex($i)
    {
        return floor(($i - 1) / 2);
    }

    /**
     * Returns the index of the left child node for the given index.
     *
     * @param int $i
     * @return int
     */
    protected function getLeftChildIndex($i)
    {
        return 2 * $i + 1;
    }

    /**
     * Returns the index of the right child node for the given index.
     *
     * @param int $i
     * @return int
     */
    protected function getRightChildIndex($i)
    {
        return 2 * $i + 2;
    }
}
