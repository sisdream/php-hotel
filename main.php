<?php
    $hotels = [
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Quaint, Inviting, Charming',
            'parking' => true,
            'vote' => 3,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Majestic, Historic, Sophisticated',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Rustic, Scenic, Serene',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 2.4
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Elegant, Luxurious, Upscale',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Modern, Stylish, Trendy',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],
        [
            'name' => 'Hotel Ognissanti',
            'description' => 'Beachfront, Tropical, Relaxing',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 1.5
        ],
    ];

    $filteredHotels = $hotels;
    $filter = $_POST['hotels_filter'] ?? null;

    if(isset($_POST['hotels_filter'])) {
        $filteredHotels = [];
    }

    if ($filter === "all") {
        $filteredHotels = $hotels;
    }

    if ($filter === "w_parking") {
        $filteredHotels = [];
        foreach($hotels as $hotel) {
            if ($hotel["parking"]) $filteredHotels[] = $hotel;
        }
    }
?>