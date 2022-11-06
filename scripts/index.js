let messageListArray = []
let onlineUsersArray = []
let messageUpdateInterval
let username = ""

const updateMessageListFromArray = (newMessageListArray) => {
    let messageList = document.querySelector(".chat-list")

    //Filter newly added messages. If there are new messages, update the chat. Prevents selection jumping
    let messageAppendContent = ""
    for(let newMsg of newMessageListArray) {
        let existsFlag = false
        for(let oldMsg of messageListArray) {
            if(newMsg.client_id === oldMsg.client_id) {
                existsFlag = true
                break
            }
        }
        if(existsFlag === false) {
            messageAppendContent += `
                <div class="chat-list-message">
                    ${newMsg.author}> ${newMsg.content}
                </div>
            `
        }
    }
    if(messageAppendContent[0]) messageList.innerHTML += messageAppendContent;
}
const updateOnlineUsersFromArray = () => {
    let onlineUserList = document.querySelector(".online-user-list")

    let newUserListContent = ""

    for(let user of onlineUsersArray) {
        newUserListContent += `
            <div class="user">${user.username}</div>
        `
    }

    onlineUserList.innerHTML = newUserListContent
}

const setUser = (e) => {
    e.preventDefault()
    let formData = new FormData(e.target)
    fetch("/endpoints/set_online.php", {method: "POST", body: formData}).then(data => data.json()).then(
        data => {
            if(data.err) {
                return console.log("error", data.err)
            }
            
            username = data.data.username
            toggleNameBox()
            toggleChat()
        },
        err => console.log(err)
    )
    clearInputs()
}

const sendMessage = (e) => {
    e.preventDefault()
    let formData = new FormData(e.target)
    fetch("/endpoints/send_message.php", {method: "POST", body: formData}).then(data => data.json()).then(
        data => {
            if(data.err) {
               return console.log("error", data.err)
            }
        },
        err => console.log(err)
    )
    clearInputs()
}

const readMessages = () => {
    fetch("/endpoints/read_messages.php", {method: "GET"}).then(data => data.json()).then(
        data => {
            if(data[0].err) {
                return console.log("error0", data.err)
            }
            if(data[1].err) {
                return console.log("error1", data.err) 
            }
            updateMessageListFromArray(data[0].data)
            messageListArray = data[0].data

            onlineUsersArray = data[1].data
            updateOnlineUsersFromArray()
        },
        err => console.log(err)
    )
}

const init = () => {
    fetch("/endpoints/check_if_already_online.php", {method: "GET"}).then(data => data.json()).then(
        data => {
            if(data.err) {
               return console.log("error", data.err)
            }
            if(data.data) toggleChat()
            else toggleNameBox()
        },
        err => console.log(err)
    )
}

const clearInputs = () => {
    let chatInput = document.querySelector("#chat-input")
    chatInput.value = ""
}

window.onload = () => {
    init()
}

const toggleChat = () => {
    let chat = document.querySelector(".chat-container")
    chat.classList.toggle("hidden")

    if(chat.classList.contains("hidden")) {
        clearInterval(messageUpdateInterval)
    }
    else {
        readMessages()
        messageUpdateInterval = setInterval(() => {
            readMessages()
        }, 1000)
    }
}
const toggleNameBox = () => {
    let nameBox = document.querySelector(".name-box-container")
    nameBox.classList.toggle("hidden")
}