<?php
    require_once "./main.php";

    $filteredHotels = $hotels;
    $filter = $_GET['hotels_filter'] ?? null;
    $filter_vote = $_GET['filter_vote'] ?? false;

    if ($filter === "w_parking") {
        $filteredHotels = array_filter($filteredHotels, fn($hotel) => $hotel["parking"]);
    }

    if($filter_vote) {
        $filteredHotels = array_filter($filteredHotels, fn($hotel) => $hotel["vote"] >= $filter_vote);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.css' integrity='sha512-bR79Bg78Wmn33N5nvkEyg66hNg+xF/Q8NA8YABbj+4sBngYhv9P8eum19hdjYcY7vXk/vRkhM3v/ZndtgEXRWw==' crossorigin='anonymous'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css' integrity='sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw==' crossorigin='anonymous'/>
    <title>Hotels</title>
</head>
<body>
    <h1 class="text-center fw-bold mb-3"><i class="fa-solid fa-hotel text-warning"></i> Hotels</h1>

    <div class="container">
    <form action="index.php" method="GET" class="d-flex flex-column mb-2">
        <select class="form-select" name="hotels_filter" id="hotels" aria-label="hotels">
            <option value="all">All Hotels</option>
            <option value="w_parking">Hotels with Parking</option>
        </select>
        <div class="mb-3">
            <label for="filter_vote" class="form-lable">Voto</label>
            <input type="number" class="form-control" id="filter_vote" name="filter_vote" min="1" max="5">
        </div>
        <button type="submit" class="btn btn-warning ms-2">Submit</button>
    </form>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <?php foreach ($hotels[0] as $key => $value ) : ?>
                <th scope="col" class="fw-bold text-uppercase">
                    <?php
                        if ($key === 'distance_to_center') {
                            $key = 'Distance to Center';
                        }
                        echo "$key";
                    ?>
                </th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filteredHotels as $hotel ) : ?>
            <tr>
                <?php foreach ($hotel as $key => $value) : ?>
                <td scope="col">
                    <?php
                        if ($key === 'parking') {
                            $value ? $value = 'Available' : $value ='Not Available'; 
                        }
                        if ($key === 'vote') {
                            $value = $value . ' ' . '<i class="fa-solid fa-star" style="color: #FFC107;"></i>';
                        }
                        if ($key === 'distance_to_center') {
                            $value = $value . ' ' . 'km';
                        }
                        echo "$value";
                    ?>
                </td>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>