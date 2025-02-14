<?php

namespace KMeans;

use KMeans\DistanceInterface;
use KMeans\Cluster;

class KMeans {
    private int $k;
    private DistanceInterface $distanceCalculator;

    public function __construct(int $k, DistanceInterface $distanceCalculator) {
        if ($k <= 0) {
            throw new \InvalidArgumentException('K must be greater than 0');
        }
        $this->k = $k;
        $this->distanceCalculator = $distanceCalculator;
    }

    public function cluster(array $data): array 
    {
        $clusters = $this->initializeClusters($data);
        $iterations = 100; // Prevent infinite loops
        do {
            foreach ($clusters as $cluster) $cluster->clearPoints();
            $this->assignPointsToClusters($data, $clusters);
            $newCentroids = array_map(fn($c) => $c->calculateNewCentroid(), $clusters);
            $changes = false;
            foreach ($clusters as $i => $cluster) {
                if ($cluster->getCentroid() != $newCentroids[$i]) {
                    $cluster->setCentroid($newCentroids[$i]);
                    $changes = true;
                }
            }
        } while ($changes && --$iterations > 0);
        return $clusters;
    }

    private function initializeClusters(array $data): array 
    {
        $centroids = array_slice($data, 0, $this->k);
        return array_map(fn($c) => new Cluster($c), $centroids);
    }

    private function assignPointsToClusters(array $data, array &$clusters): void 
    {
        foreach ($data as $point) {
            $distances = array_map(fn($c) => $this->distanceCalculator->calculate($point, $c->getCentroid()), $clusters);
            $closestIndex = array_keys($distances, min($distances))[0];
            $clusters[$closestIndex]->addPoint($point);
        }
    }
}

?>