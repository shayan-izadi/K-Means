<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use KMeans\Cluster;

class ClusterTest extends TestCase {

    public function testAddAndGetPoints() 
    {
        $cluster = new Cluster([1, 1]);
        $cluster->addPoint([2, 2]);
        $cluster->addPoint([3, 3]);

        $points = $cluster->getPoints();
        $this->assertCount(2, $points);
        $this->assertEquals([2, 2], $points[0]);
        $this->assertEquals([3, 3], $points[1]);
    }

    public function testSetAndGetCentroid() 
    {
        $cluster = new Cluster([0, 0]);
        $cluster->setCentroid([5, 5]);
        $this->assertEquals([5, 5], $cluster->getCentroid());
    }

    public function testClearPoints() 
    {
        $cluster = new Cluster([0, 0]);
        $cluster->addPoint([1, 1]);
        $cluster->clearPoints();
        $this->assertEmpty($cluster->getPoints());
    }
}

?>