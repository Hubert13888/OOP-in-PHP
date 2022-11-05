<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <script src="scripts/index.js" defer></script>
    <title>Public chat</title>
</head>
<body>
    <main>
        <div class="chat-container">
            <div class="chat-list">
                <div class="chat-list-message">
                    Ile dałbym by zapomnieć cię
                </div>
                <div class="chat-list-message">
                    wszystkie chwile te, które są
                </div>
                <div class="chat-list-message">
                    na nie, bo chcę
                </div>
            </div>
            <div class="chat-bottom-bar">
                <form onsubmit="sendMessage(event)">
                    <input id="chat-input" type="text" name="user-msg" placeholder="Type your message"/>
                    <button>Send</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>