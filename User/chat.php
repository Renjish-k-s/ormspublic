<?php
include './Partials_out/header.php';



// Receiver ID from URL
$receiver_id = isset($_GET['revid']) ? $_GET['revid'] : 2;


// Handle message send
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['message'])) {
    $sender_id =  isset($_GET['aid']) ? $_GET['aid'] : 2;
    $msg = $con->real_escape_string($_POST['message']);
    $sql = "INSERT INTO `chat_table`(`sender_id`, `reciver_id`, `message`) VALUES ('$sender_id', '$receiver_id', '$msg')";
    $con->query($sql);
}

// Fetch chat history
$my_id = isset($_GET['aid']) ? $_GET['aid'] : 2;
$sql = "SELECT * FROM chat_table WHERE 
        (sender_id = $my_id AND reciver_id = $receiver_id) OR 
        (sender_id = $receiver_id AND reciver_id = $my_id)
        ORDER BY on_create ASC";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Chat</title>
    <style>
        body {
            font-family: Arial;
            background: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        .chat-container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            height: 70vh;
            overflow-y: scroll;
        }

        .message {
            padding: 10px 15px;
            border-radius: 20px;
            margin: 10px 0;
            max-width: 70%;
            word-wrap: break-word;
        }

        .sent {
            background-color: #DCF8C6;
            text-align: right;
            margin-left: auto;
        }

        .received {
            background-color: #ECECEC;
            text-align: left;
            margin-right: auto;
        }

        .timestamp {
            font-size: 12px;
            color: gray;
            margin-top: 5px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            display: flex;
            padding: 20px;
            background: #fff;
            border-top: 1px solid #ccc;
        }

        input[type="text"] {
            flex: 1;
            padding: 10px;
            border-radius: 20px;
            border: 1px solid #ccc;
            outline: none;
        }

        button {
            padding: 10px 20px;
            margin-left: 10px;
            border: none;
            border-radius: 20px;
            background: #4CAF50;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background: #45a049;
        }
    </style>
</head>
<body>

<div class="chat-container">
    <?php
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $class = ($row['sender_id'] == $my_id) ? 'sent' : 'received';
            $timestamp = date("d M Y h:i A", strtotime($row['on_create']));
            echo "<div class='message $class'>
                    <div>{$row['message']}</div>
                    <div class='timestamp' style='text-align: " . ($class == 'sent' ? 'right' : 'left') . ";'>
                        $timestamp
                    </div>
                  </div>";
        }
    } else {
        echo "<p style='text-align:center;color:#999;'>No messages yet.</p>";
    }
    ?>
</div>

<form method="post" action="">
    <input type="text" name="message" placeholder="Type your message..." required>
    <button type="submit">Send</button>
</form>

</body>
</html>
