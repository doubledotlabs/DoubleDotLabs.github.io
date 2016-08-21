<!DOCTYPE html>
<html>
<body>

<?php
header("Access-Control-Allow-Origin: *");

$userId = $_GET["user"];
$room = $_GET["room"];
$name = $_GET["name"];
$text = $_GET["text"];
$image = $_GET["image"];

$roomsJson = "";

if (!file_exists("rooms.json")) {
    $rooms = fopen("rooms.json", "w") or die("unable to create rooms.json");
    fclose($rooms);
} else $roomsJson = file_get_contents("rooms.json") or die("unable to open rooms.json");

if ($room != null && $name != null) {
    $fileName = "chats/chat-" . $room . ".json";

    $textsJson = "";

    if (!file_exists($fileName)) {
        $roomJson = json_encode(array('name' => $name, 'id' => $room));

        if (strlen($roomsJson) > 0) $roomsJson = substr_replace($roomsJson, "," . $roomJson, strlen($roomsJson) - 1) . "]";
        else $roomsJson = "[" . $roomJson . "]";

        $rooms = fopen("rooms.json", "w") or die("unable to write to rooms.json");

        fwrite($rooms, $roomsJson);
        fclose($rooms);

        $texts = fopen($fileName, "w") or die("unable to create " . $fileName);
        fclose($texts);
    } else $textsJson = file_get_contents($fileName) or die("unable to read " . $fileName);

    if ($userId != null && ($text != null || $image != null)) {
        $textJson = null;
        if ($text != null) {
            $textJson = json_encode(array('user' => $userId, 'text' => $text, 'date' => date('Y-m-d H:i:s')));
        } else if ($image != null) {
            $textJson = json_encode(array('user' => $userId, 'image' => $image, 'date' => date('Y-m-d H:i:s')));
        }

        if ($textJson != null) {
            if (strlen($textsJson) > 0) $textsJson = substr_replace($textsJson, "," . $textJson, strlen($textsJson) - 1) . "]";
            else $textsJson = "[" . $textJson . "]";

            $texts = fopen($fileName, "w") or die("unable to write to " . $fileName);

            fwrite($texts, $textsJson);
            fclose($texts);
        }

        echo $textsJson;
    } else echo $roomsJson;
} else echo $roomsJson;

?>

</body>
</html>
