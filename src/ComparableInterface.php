<?php

namespace Afonso\Dsalg;

/**
 * An interface for classes which can be compared to other classes.
 */
interface ComparableInterface
{
    public function compareTo(Comparable $comparable);
}
