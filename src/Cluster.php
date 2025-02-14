<?php

namespace KMeans;

class Cluster {
    private array $points = [];
    private array $centroid;

    public function __construct(array $centroid) 
    {
        $this->centroid = $centroid;
    }

    public function addPoint(array $point): void 
    {
        $this->points[] = $point;
    }

    public function getPoints(): array 
    {
        return $this->points;
    }

    public function calculateNewCentroid(): array 
    {
        if (empty($this->points)) return $this->centroid;
        $dimensions = count($this->points[0]);
        $newCentroid = array_fill(0, $dimensions, 0);
        foreach ($this->points as $point) {
            foreach ($point as $i => $value) {
                $newCentroid[$i] += $value;
            }
        }
        foreach ($newCentroid as $i => $value) {
            $newCentroid[$i] /= count($this->points);
        }
        return $newCentroid;
    }

    public function setCentroid(array $centroid): void 
    {
        $this->centroid = $centroid;
    }

    public function getCentroid(): array 
    {
        return $this->centroid;
    }

    public function clearPoints(): void 
    {
        $this->points = [];
    }
}

?>