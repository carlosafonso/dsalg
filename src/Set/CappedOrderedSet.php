<?php

namespace Afonso\Dsalg\Set;

class CappedOrderedSet extends OrderedSet
{
    const KEEP_HIGH = 1;
    const KEEP_LOW  = 2;

    private $maxSize;
    private $keep;

    public function __construct($maxSize, $keep = self::KEEP_HIGH, callable $compareFn = null)
    {
        parent::__construct($compareFn);

        $this->maxSize = $maxSize;

        if ($keep !== self::KEEP_HIGH && $keep !== self::KEEP_LOW) {
            $keep = self::KEEP_HIGH;
        }
        $this->keep = $keep;
    }

    protected function insertAt($n, $idx)
    {
        parent::insertAt($n, $idx);

        if ($this->maxSize && count($this->s) > $this->maxSize) {
            if ($this->keep === self::KEEP_HIGH) {
                $this->s = array_slice($this->s, 1);
            } else {
                $this->s = array_slice($this->s, 0, count($this->s) - 1);
            }
        }
    }
}
