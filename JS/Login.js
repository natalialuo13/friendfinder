function login() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    var correctUsername = "admin";
    var correctPassword = "admin123";

    if(username === correctUsername && password === correctPassword) {
        window.location.href = "Home.php";
    }else {
        alert("Invalid Username or Password");
    }
}