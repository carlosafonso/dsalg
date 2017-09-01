<?php

namespace Afonso\Dsalg\Set;

class OrderedSet
{
    protected $s = [];
    protected $compareFn;

    public function __construct(callable $compareFn = null)
    {
        $this->compareFn = $compareFn;
    }

    public function all()
    {
        return $this->s;
    }

    public function add($n)
    {
        if (empty($this->s)) {
            $this->s[] = $n;
        } else {
            $this->addRecursive($n, 0, count($this->s) - 1);
        }
    }

    protected function addRecursive($n, $f, $t)
    {
        if ($this->compare($n, $this->s[$t]) === 1) {
            $this->insertAt($n, $t + 1);
        } elseif ($this->compare($n, $this->s[$f]) <= 0) {
            $this->insertAt($n, $f);
        } else {
            $m = $f + floor(($t - $f) / 2);

            if ($this->compare($n, $this->s[$m]) < 0) {
                $this->addRecursive($n, $f, $m - 1);
            } else {
                $this->addRecursive($n, $m + 1, $t);
            }
        }
    }

    protected function insertAt($n, $idx)
    {
        $this->s = array_merge(
            array_slice($this->s, 0, $idx),
            [$n],
            array_slice($this->s, $idx, null)
        );
    }

    private function compare($a, $b)
    {
        if ($this->compareFn) {
            return call_user_func($this->compareFn, $a, $b);
        }
        if ($a > $b) {
            return 1;
        }
        if ($a < $b) {
            return -1;
        }
        return 0;
    }
}
