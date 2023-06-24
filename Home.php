<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

$username = $_SESSION['username'];

$conn = mysqli_connect("localhost", "id20825700_root", "Natalia@1303", "id20825700_friendfinder");
if (!$conn) {
    echo 'Connection failed';
}

if (isset($_POST['submit'])) {
    $caption = mysqli_real_escape_string($conn, $_POST['caption']);
    $imageCount = count($_FILES['image']['name']);
    for ($i = 0; $i < $imageCount; $i++) {
        $imageName = $_FILES['image']['name'][$i];
        $imageTempName = $_FILES['image']['tmp_name'][$i];
        $targetPath = "./upload/" . $imageName;
        if (move_uploaded_file($imageTempName, $targetPath)) {
            $sql = "INSERT INTO images(image, caption) VALUES ('$imageName', '$caption')";
            $result = mysqli_query($conn, $sql);
        }
    }
    if ($result) {
        header('location:Home.php?msg=ins');
    }
}

// Delete image and caption from database
if (isset($_GET['delete'])) {
    $imageId = $_GET['delete'];
    $sql = "DELETE FROM images WHERE id=$imageId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:Home.php?msg=del');
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../JS/Home.js"></script>
</head>

<body>
    <header>
        <h1>Friend Finder</h1>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="Profile.php">Profile</a></li>
                <li><a href="Friend.php">Friend</a></li>
                <li><button class="button" id="logoutBtn"><a href="Logout.php">Logout</a></button></li>
            </ul>
        </nav>
    </header>

    <?php
    $conn = mysqli_connect("localhost", "id20825700_root", "Natalia@1303", "id20825700_friendfinder");
    $sql = "SELECT * FROM images ORDER by timestamp asc";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($fetch = mysqli_fetch_assoc($result)) {
            ?>
            <div style="position: relative;">
                <h4 width=150 height=150 style="position: absolute; top: 100px; left: 120px; text-align: justify; background-color: rgba(255, 255, 255, 0.8); padding: 10px;"><?php echo $fetch['caption']; ?></h4>
                <img src="upload/<?php echo $fetch['image']; ?>" width=1100 height=400 style="margin-top: 150px; margin-bottom: 20px; margin-left: 120px;">
                <a name="delete" href="Home.php?delete=<?php echo $fetch['id']; ?>" style="margin-top: 50px; margin-left: 650px; color: red;"><i class="fa fa-trash"></i> Delete</a>
            </div>
        <?php
        }
    }
    ?>

    <main>
        <div class="container">
            <div class="notif-menu">
                <button onclick="location.href='Message.php'" class="msg">
                    <i class="fa fa-envelope"></i>
                </button>
                <button class="add" onclick="create_post()">
                    <i class="fa fa-plus"></i>
                </button>
                <button class="home">
                    <i class="fa fa-home"></i>
                </button>
            </div>
            <div class="modal" id="myForm">
                <form action="Home.php" method="POST" enctype="multipart/form-data" class="form-container">
                    <h1>Write Something to Post</h1><br>
                    <label for="upload_gambar" id="upload_label">Choose File</label><br>
                    <input type="file" class="file-input" id="upload_gambar" name="image[]" accept="image/*" onchange="showPreview(event)" required>
                    <img id="preview"><br>
                    <h4 style="margin-right: 840px";><b>Write The Description</b></h4><br>
                    <label for="caption"></label>
                    <input type="text" name="caption" style="height: 50px;">

                    <div class="form-btn">
                        <button type="submit" name="submit" class="submit_btn">Post</button>
                        <button type="button" class="cancel_btn" onclick="closeForm()">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </main>
    <footer>

        <b>Hak cipta &copy; 2023 Friend Finder.</b>
    </footer>
</body>

</html>

<script>
    // Finding a button with the class "home"
    var homeBtn = document.querySelector('.home');

    // Adding an event listener to handle button click
    homeBtn.addEventListener('click', function () {
        // Using smooth scrolling to scroll back to the top of the page
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>
