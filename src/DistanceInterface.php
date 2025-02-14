<?php

namespace KMeans;

interface DistanceInterface {
    public function calculate(array $point1, array $point2): float;
}

?>