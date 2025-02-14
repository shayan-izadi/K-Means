<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use KMeans\KMeans;
use KMeans\EuclideanDistance;

class KMeansTest extends TestCase {
    public function testClusteringOutput() {
        $data = [
            [1, 2], [2, 3], [5, 8], [8, 8], [1, 0.5], [9, 11]
        ];
        $kmeans = new KMeans(2, new EuclideanDistance());
        $clusters = $kmeans->cluster($data);

        $this->assertCount(2, $clusters, 'Should create 2 clusters');
        foreach ($clusters as $cluster) {
            $this->assertNotEmpty($cluster->getPoints(), 'Each cluster should have points assigned');
            $this->assertIsArray($cluster->getCentroid(), 'Each cluster should have a centroid');
        }
    }

    public function testInvalidKValue() {
        $this->expectException(\InvalidArgumentException::class);
        new KMeans(0, new EuclideanDistance());
    }
}

?>