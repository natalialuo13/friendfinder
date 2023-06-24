function send() {
    var message = document.getElementById("input-message").value;
    if (message.trim() === "") return; // cek apakah pesan kosong
  
    // membuat element chat baru
    var newChat = document.createElement("div");
    newChat.className = "chat";
    newChat.id = "my-chat";
    newChat.innerHTML = `
      <div id="my-chat" class="chat-content me">
      <span>${message}</span>
      </div>
      <img src="../img/hanni.jpg" alt="">
      `;
  
    // menambahkan element chat baru ke dalam box-chat
    var boxChat = document.getElementById("box-chat");
    boxChat.insertBefore(newChat, boxChat.lastElementChild);
  
    // reset input message
    document.getElementById("input-message").value = "";
  }