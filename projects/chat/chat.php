<!DOCTYPE html>
<html>
<body>

<?php

$userId = $_GET["user"];
$room = $_GET["room"];
$name = $_GET["name"];
$text = $_GET["text"];
$image = $_GET["image"];

$roomsJson = "";

if (!file_exists("rooms.json")) {
    //create rooms.json if it doesn't exist already
    $rooms = fopen("rooms.json", "w") or die("unable to create rooms.json");
    fclose($rooms);
} else {
    //get its contents if it already exists
    $roomsJson = file_get_contents("rooms.json") or die("unable to open rooms.json");
}

if ($room != null) {
    $fileName = "chats/chat-" . $room . ".json";

    $textsJson = "";

    if (!file_exists($fileName)) {
        if ($name != null) {
          //create the chatroom if it doesn't exist and the name is specified
          $roomJson = json_encode(array('name' => $name, 'id' => $room));

          if (strlen($roomsJson) > 0) $roomsJson = substr_replace($roomsJson, "," . $roomJson, strlen($roomsJson) - 1) . "]";
          else $roomsJson = "[" . $roomJson . "]";

          $rooms = fopen("rooms.json", "w") or die("unable to write to rooms.json");

          fwrite($rooms, $roomsJson);
          fclose($rooms);

          $texts = fopen($fileName, "w") or die("unable to create " . $fileName);
          fclose($texts);  
        } else echo "room not created";
    } else $textsJson = file_get_contents($fileName) or die("unable to read " . $fileName);

    if ($userId != null && ($text != null || $image != null)) {
        //verify the user token and replace the temporary id with a real one
        $curl = curl_init("https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=" . $userId);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        $data = curl_exec($curl);
        curl_close($curl);

        $json = json_decode($data);
        $userId = $json->sub;

        $textJson = null;
        if ($text != null) {
            //make a text post
            $textJson = json_encode(array('user' => $userId, 'text' => $text, 'date' => date('Y-m-d H:i:s')));
        } else if ($image != null) {
            //make an image post
            $textJson = json_encode(array('user' => $userId, 'image' => $image, 'date' => date('Y-m-d H:i:s')));
        }

        if ($textJson != null) {
            if (strlen($textsJson) > 0) {
                //json already exists, add to existing stuff
                $textsJson = substr_replace($textsJson, "," . $textJson, strlen($textsJson) - 1) . "]";
            } else {
                //json doesn't exist yet, make a new array'
                $textsJson = "[" . $textJson . "]";
            }

            $texts = fopen($fileName, "w") or die("unable to write to " . $fileName);

            fwrite($texts, $textsJson);
            fclose($texts);
        }

        echo $textsJson;
    } else echo $textsJson;
} else echo $roomsJson;

?>

</body>
</html>
