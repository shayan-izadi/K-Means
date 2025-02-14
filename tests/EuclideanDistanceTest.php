<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use KMeans\EuclideanDistance;

class EuclideanDistanceTest extends TestCase {
    public function testCalculate() {
        $distance = new EuclideanDistance();

        $point1 = [3, 4];
        $point2 = [0, 0];
        $result = $distance->calculate($point1, $point2);
        $this->assertEquals(5.0, round($result), 'Distance between (3,4) and (0,0) should be 5.0');

        $point1 = [1, 2, 3];
        $point2 = [4, 0, 0];
        $result = $distance->calculate($point1, $point2);
        $this->assertEquals(5.0, round($result), 'Distance between (1,2,3) and (4,0,0) should be 5.0');

        $point1 = [0, 0];
        $point2 = [0, 0];
        $result = $distance->calculate($point1, $point2);
        $this->assertEquals(0.0, round($result), 'Distance between identical points should be 0.0');
    }
}


?>