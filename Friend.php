<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Friend</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../CSS/Friend.css" />
    <script src="../JS/Logout.js"></script>
    <script>
      function searchFriends() {
        var input = document.getElementById("search-input").value.toLowerCase();
        var friends = document.getElementsByClassName("friend");

        for (var i = 0; i < friends.length; i++) {
          var friend = friends[i];
          var name = friend
            .getElementsByClassName("friend-name")[0]
            .textContent.toLowerCase();

          if (name.includes(input)) {
            friend.style.display = "block";
          } else {
            friend.style.display = "none";
          }
        }
      }
    </script>
  </head>

  <body>
    <header>
      <h1>Friend Finder</h1>
      <nav>
        <ul>
          <li><a href="Home.php">Home</a></li>
          <li><a href="Profile.php">Profile</a></li>
          <li><a href="#">Friend</a></li>
          <li><a class="button" id="logoutBtn" href="Logout.php">Logout</a></li>
        </ul>
      </nav>
    </header>

    <div class="container">
      <div class="search">
        <img src="../Img/search.jpeg" alt="" />
        <input
          id="search-input"
          type="text"
          placeholder="Search..."
          oninput="searchFriends()"
        />
      </div>

      <div class="content">
        <div class="image1">
          <img src="../Img/user_account.png" alt="profil" />
          <h1>Friend request (4)</h1>
        </div>

        <div class="satu">
          <div class="col friend">
            <div class="row">
              <img src="../Img/mark.jpeg" alt="profil" />
            </div>
            <div class="row">
              <h3 class="friend-name">Mark Lee</h3>
              <div class="btn">
                <a href="#" class="button6 button">Confirm</a>
                <a href="#" class="button7 button">Delete</a>
              </div>
            </div>
          </div>
          <div class="col friend">
            <div class="row">
              <img src="../Img/renjun.jpeg" alt="profil" />
            </div>
            <div class="row">
              <h3 class="friend-name">Renjun Hwang</h3>
              <div class="btn">
                <a href="#" class="button6 button">Confirm</a>
                <a href="#" class="button7 button">Delete</a>
              </div>
            </div>
          </div>
          <div class="col friend">
            <div class="row">
              <img src="../Img/jeno.jpeg" alt="profil" />
            </div>
            <div class="row">
              <h3 class="friend-name">Jeno Lee</h3>
              <div class="btn">
                <a href="#" class="button6 button">Confirm</a>
                <a href="#" class="button7 button">Delete</a>
              </div>
            </div>
          </div>
          <div class="col friend">
            <div class="row">
              <img src="../Img/haechan.jpeg" alt="profil" />
            </div>
            <div class="row">
              <h3 class="friend-name">Haechan Lee</h3>
              <div class="btn">
                <a href="#" class="button6 button">Confirm</a>
                <a href="#" class="button7 button">Delete</a>
              </div>
            </div>
          </div>
        </div>

        <hr />

        <h1 id="friend3" class="friend3">Friend 3</h1>

        <div class="dua">
          <div class="dua-content friend">
            <div class="col">
              <div class="row">
                <img src="../Img/jaemin.jpeg" alt="profil" />
                <div class="onof">
                  <p>online</p>
                  <img src="../Img/online.jpeg" alt="ikon" />
                </div>
              </div>
              <div class="row">
                <h3 class="friend-name">Jaemin Na</h3>
                <p>Fakultas Teknik IT 2021</p>
                <p>Basket</p>
              </div>
            </div>
            <div class="btn">
              <a href="ProfileFriend.html" class="button15 button">Profil</a>
            </div>
          </div>

          <div class="dua-content friend">
            <div class="col">
              <div class="row">
                <img src="../Img/chenle.jpeg" alt="profil" />
                <div class="onof">
                  <p>Offline</p>
                  <img src="../Img/offline.png" alt="ikon" />
                </div>
              </div>
              <div class="row">
                <h3 class="friend-name">Chenle Zhong</h3>
                <p>Fakultas Teknik Arsitek 2020</p>
                <p>Bermain musik</p>
              </div>
            </div>
            <div class="btn">
              <a href="#" class="button15 button">Profil</a>
            </div>
          </div>

          <div class="dua-content friend">
            <div class="col">
              <div class="row">
                <img src="../Img/jisung.jpeg" alt="profil" />
                <div class="onof">
                  <p>online</p>
                  <img src="../Img/online.jpeg" alt="ikon" />
                </div>
              </div>
              <div class="row">
                <h3 class="friend-name">Jisung Park</h3>
                <p>Fakultas Kedokteran Dokter 2021</p>
                <p>Futsal</p>
              </div>
            </div>
            <div class="btn">
              <a href="#" class="button15 button">Profil</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
		<b>Hak cipta &copy; 2023 Friend Finder.</b>
    </footer>
  </body>
</html>