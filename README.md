# K-Means PHP Library

**PHP Requirement:** PHP 7.4 or higher


## Usage

```php
require 'vendor/autoload.php';
use KMeans\KMeans;
use KMeans\EuclideanDistance;

$data = [
    [1, 2], [2, 3], [5, 8], [8, 8], [1, 0.5], [9, 11]
];

$kmeans = new KMeans(2, new EuclideanDistance());
$clusters = $kmeans->cluster($data);

foreach ($clusters as $index => $cluster) {
    echo "Cluster $index:\n";
    print_r($cluster->getPoints());
    echo "Centroid: ";
    print_r($cluster->getCentroid());
}
```

## License

This library is licensed under the MIT License. See the LICENSE file for details.
