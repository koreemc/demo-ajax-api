
<?php

// Tell the browser that the response is JSON
header("Content-Type: application/json");

// Create an array of five makeup products
$products = [

    [
        "id" => 1,
        "name" => "Velvet Matte Lipstick",
        "description" => "Long-lasting matte lipstick with a smooth finish.",
        "price" => 450,
        "image" => "https://demo-backend.infinityfree.me/images/lipstick.jpg"
    ],

    [
        "id" => 2,
        "name" => "Liquid Foundation",
        "description" => "Lightweight foundation for an even skin tone.",
        "price" => 650,
        "image" => "https://demo-backend.infinityfree.me/images/foundation.jpg"
    ],

    [
        "id" => 3,
        "name" => "Powder Blush",
        "description" => "Soft powder blush for a natural-looking glow.",
        "price" => 380,
        "image" => "https://demo-backend.infinityfree.me/images/blush.jpg"
    ],

    [
        "id" => 4,
        "name" => "Eyeshadow Palette",
        "description" => "Versatile eyeshadow colors for everyday looks.",
        "price" => 720,
        "image" => "https://demo-backend.infinityfree.me/images/eyeshadow.jpg"
    ],

    [
        "id" => 5,
        "name" => "Volume Mascara",
        "description" => "Mascara designed to add volume and definition.",
        "price" => 350,
        "image" => "https://demo-backend.infinityfree.me/images/mascara.jpg"
    ]

];

// Did the visitor ask for one product? (example: ?id=3)
if (isset($_GET["id"])) {
    // turn the text "3" into the number 3
    $id = (int) $_GET["id"];           

    foreach ($products as $product) {
        if ($product["id"] === $id) {
            
            // send this one product
            echo json_encode($product); 
            
            // stop here
            exit;                       
        }
    }

    // No product has that id: send a 404 status and a message.
    http_response_code(404);
    echo json_encode(["error" => "Product not found"]);
    exit;
}

// Convert the PHP array into JSON
$json = json_encode($products);

// Send the JSON response
echo $json;

?>
