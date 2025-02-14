<?php

namespace KMeans;

class EuclideanDistance implements DistanceInterface {
    public function calculate(array $point1, array $point2): float {
        $sum = 0.0;
        if (count($point1) !== count($point2)) {
            throw new \InvalidArgumentException('Points must have the same dimension');
        }
        foreach ($point1 as $i => $value) {
            $sum += ($value - $point2[$i]) * ($value - $point2[$i]);
        }
        return sqrt($sum);
    }
}

?>