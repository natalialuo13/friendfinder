<?php
require('db.php');

// If form submitted, insert values into the database.
if (isset($_POST['chat'])) {
    // removes backslashes
    $chat = mysqli_real_escape_string($conn, $_POST['chat']);
 
    // Checking if the user exists in the database
    $sql = "INSERT INTO message(chat) VALUES ('$chat')";
    $result = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direct Message</title>
    <link rel="stylesheet" href="../CSS/Message.css">
</head>
<body>
    <header id="header-Chat">
        <span>Direct Message</span>
    </header>
    <div class="container">
        <div id="box-chat" class="box-chat">
            <div id="friend-chat" class="chat">
                <img src="../Img/jaemin.jpeg" alt="">
                <div class="chat-content friend">
                    <span id="fchat">Halo</span>
                </div>
            </div>
            <div id="my-chat" class="chat">
                <div id="me" class="chat-content me">
                    <span id="mchat">hay</span>
                </div>
                <img src="../Img/hanni.jpg" alt="">
            </div>
            <div id="friend-chat" class="chat">
                <img src="../Img/jaemin.jpeg" alt="">
                <div class="chat-content friend">
                    <span id="fchat">Kita sejurusan, nih. ayo ketemu</span>
                </div>
            </div>
            <div id="my-chat" class="chat">
                <div id="me" class="chat-content me">
                    <span id="mchat">boleh deh. besok?</span>
                </div>
                <img src="../Img/hanni.jpg" alt="">
            </div>
            <div id="friend-chat" class="chat">
                <img src="../Img/jaemin.jpeg" alt="">
                <div class="chat-content friend">
                    <span id="fchat">Iya boleh</span>
                </div>
            </div>
            <?php
            // Retrieve messages from the database
            $sql = "SELECT * FROM message ORDER by timestamp asc";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div id="my-chat" class="chat">
                        
                        <div style="background-color: #0a7720; border-radius: 7px; color: #e0dfdf; font-weight: 400; padding: 5px 25px 5px 10px;" id="mchat">' . $row['chat'] . '</div>
                        <img style="margin-top: 20px;" src="../Img/hanni.jpg" alt="">
                      </div>';
            }
            ?>
            <div id="new-chat"></div>
        </div>
        <div class="box-typing">
            <button>
                <img src="../Img/hanni.jpg" alt="">
            </button>
            <form method="POST" action="Message.php">
                <input type="text" id="input-message" placeholder="Type your text" name="chat">
                <button type="submit" id="btn-send">
                    <img src="../Img/send.png" alt="">
                </button>
            </form>
        </div>
    </div>
</body>
</html>