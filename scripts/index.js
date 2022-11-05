const sendMessage = (e) => {
    e.preventDefault()
    let formData = new FormData(e.target)
    fetch("/endpoints/send_message.php", {method: "POST", body: formData}).then(data => data.json()).then(
        data => console.log(data),
        err => console.log(err)
    )
}