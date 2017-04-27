<?php

namespace Afonso\Dsalg;

/**
 * A sorter implementing the Bubblesort algorithm.
 */
class Bubblesort implements SorterInterface
{
    public function sort(array $set, ComparatorInterface $comparator)
    {
        $n = count($set);
        for ($i = 0; $i < $n; $i++) {
            $clean = true;
            for ($j = 0; $j < ($n - 1); $j++) {
                $a = $set[$j];
                $b = $set[$j + 1];
                if ($comparator->compare($a, $b) > 0) {
                    $set[$j + 1] = $a;
                    $set[$j] = $b;
                    $clean = false;
                }
            }

            if ($clean) {
                break;
            }
        }

        return $set;
    }
}
