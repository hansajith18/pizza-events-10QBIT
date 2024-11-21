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
$best_option = null;
foreach ($packages as $package) {
    $package_needed = ceil($total_slices / $package['slices']);
    $total_cost = $package_needed * $package['price'];

    $possible_packages[] = [
        "name" => $package["name"],
        "package_needed" => $package_needed,
        "total_price" => $total_cost,
        "unit_price" => $package['price'],
    ];

    if ($best_option === null || $total_cost < $best_option['total_price']) {
        $best_option = [
            'name' => $package['name'],
            "package_needed" => $package_needed,
            'total_price' => $total_cost,
        ];
    }
}

//usort($possible_packages, fn($a, $b) => $a['total_price'] <=> $b['total_price']);

echo "No of people {$no_of_people} <br>";
echo "No of total slices {$total_slices} <br>";

// Display packages
echo "<br>All Suitable Pizza Packages: <br>";
echo str_repeat("-", 50) . " <br>";
foreach ($possible_packages as $pkg) {
    echo "Package: {$pkg['name']} (Unit Price: \${$pkg['unit_price']})<br>";
    echo "  Packages Needed: {$pkg['package_needed']} <br>";
    echo "  Total Price: \${$pkg['total_price']} <br>";
    echo str_repeat("-", 50) . " <br>";
}

// Summary
echo " <br>Summary: <br>";
echo "No. of People: {$no_of_people} <br>";
echo "Total Slices Needed: {$total_slices} <br><br>";
echo "Most Suitable Package: {$best_option['name']} <br>";
echo "Pizza Package Needed: {$best_option['package_needed']}  <br>";
echo "Total Cost: \${$best_option['total_price']}  <br>";