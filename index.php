<?php

$no_of_people = 20;
$slices_per_person = 2;

$total_slices = $no_of_people * $slices_per_person;

$packages = [
    [
        "name" => "Small Pack",
        "price" => 15,
        "slices" => 10,
    ],
    [
        "name" => "Medium Pack",
        "price" => 25,
        "slices" => 20,
    ],
    [
        "name" => "Large Pack",
        "price" => 35,
        "slices" => 30,
    ],
    [
        "name" => "Extra-Large Pack",
        "price" => 50,
        "slices" => 50,
    ]
];

$possible_packages = [];
foreach ($packages as $package) {
    $package_needed = ceil($total_slices / $package['slices']);
    $total_cost = $package_needed * $package['price'];

    $possible_packages[] = [
        "name" => $package["name"],
        "package_needed" => $package_needed,
        "total_price" => $total_cost
    ];

}

usort($possible_packages, fn($a, $b) => $a['total_price'] <=> $b['total_price']);

echo "No of people {$no_of_people} <br>";
echo "No of total slices {$total_slices} <br>";
echo "Most suitable package: {$possible_packages[0]['name']}\n <br> <br>";

foreach ($possible_packages as $pkg) {

    echo "Total Price: $" . $pkg["total_price"] . " | Total {$pkg['package_needed']} {$pkg["name"]} Pizzas Needed <br>";
}