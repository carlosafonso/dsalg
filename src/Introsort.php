<?php

namespace Afonso\Dsalg;

class Introsort
{
    /**
     * The Heapsort sorter.
     *
     * @var \Afonso\Dsalg\Heapsort
     */
    protected $heapsort;

    /**
     * The Quicksort sorter.
     *
     * @var \Afonso\Dsalg\Quicksort
     */
    protected $quicksort;

    public function __construct()
    {
        $this->heapsort = new Heapsort();
        $this->quicksort = new Quicksort();
    }

    public function sort(array $set, ComparatorInterface $comparator)
    {
        $maxdepth = floor(log10($n)) * 2;
        return $this->introsort($set, $comparator, $maxdepth);
    }

    public function introsort(array $set, ComparatorInterface $comparator, $maxdepth)
    {
        $n = count($set);
        if ($n <= 1) {
            return $set;
        }

        if ($maxdepth === 0) {
            return $this->heapsort($set, $comparator);
        }

        $p = $this->partition($set);
        return array_merge(
            $this->introsort(array_slice($set, 0, $p), $comparator, $maxdepth - 1),
            $this->introsort(array_slice($set, $p + 1, $n), $comparator, $maxdepth - 1)
        );
    }
}
