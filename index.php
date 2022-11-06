<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <script src="scripts/index.js" defer></script>

    <link rel="stylesheet" href="common.css">

    <title>Public chat</title>
</head>
<body>
    <main>
        <div class="chat-container hidden">
            <div class="chat-top-bar">
                <div class="chat-list">
                </div>
                <div class="online-user-list-abbr">
                    <p>Users online</p>
                    <div class="online-user-list">
                    </div>
                </div>
            </div>
            <div class="chat-bottom-bar">
                <form onsubmit="sendMessage(event)">
                    <input id="chat-input" type="text" name="user-msg" placeholder="Type your message"/>
                    <button>Send</button>
                </form>
            </div>
        </div>

        <div class="name-box-container hidden">
            <form onsubmit="setUser(event)">
                <input type="text" id="userbox-input" name="username" placeholder="Enter your username"/>
                <button>Send</button>
            </form>
        </div>
    </main>
</body>
</html>