<!DOCTYPE html>
<html>
<body>

<?php
$userId = $_GET["user"];
$room = $_GET["room"];
$name = $_GET["name"];
$text = $_GET["text"];
$image = $_GET["image"];

if ($userId == null || $room == null || $name == null || ($text == null && $image == null)) echo "undefined variables";
else {
    $fileName = "chats/chat-" . $room . ".json";

    $textsJson = "";

    if (!file_exists ($fileName)) {
        $roomsJson = "";

        if (!file_exists("rooms.json")) {
            $rooms = fopen("rooms.json", "w") or die("unable to create rooms.json");
            fclose($rooms);
        } else $roomsJson = file_get_contents("rooms.json") or die("unable to open rooms.json");

        $roomJson = json_encode(array('name' => $name, 'id' => $room));

        if (strlen($roomsJson) > 2) substr_replace($roomsJson, "," . $roomJson, strlen($roomsJson) - 2);
        else $roomsJson = "[" . $roomJson . "]";

        $rooms = fopen("rooms.json", "w") or die("unable to write to rooms.json");

        fwrite($rooms, $roomsJson);
        fclose($rooms);

        $texts = fopen($fileName, "w") or die("unable to create " . $fileName);
        fclose($texts);
    } else $textsJson = file_get_contents($fileName) or die("unable to read " . $fileName);

    $textJson = "{}";
    if ($text != null) {
        $textJson = json_encode(array('user' => $userId, 'text' => $text, 'date' => date_timestamp_get(date_create())));
    } else if ($image != null) {
        $textJson = json_encode(array('user' => $userId, 'image' => $image, 'date' => date_timestamp_get(date_create())));
    }

    if (strlen($textsJson) > 2) substr_replace($textsJson, "," . $textJson, strlen($textsJson) - 2);
    else $textsJson = "[" . $textJson . "]";

    $texts = fopen($fileName, "w") or die("unable to write to " . $fileName);

    fwrite($texts, $textsJson);
    fclose($texts);

    echo $textJson;
}

?>

</body>
</html>
