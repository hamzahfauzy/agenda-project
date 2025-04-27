Notification.requestPermission().then(perm => {
    if(perm == 'granted')
    {
        const socket = io(window.SOCKET_URL);
        socket.on("connect", () => {

            const employee = window.employee
        
            socket.emit('subscribe', {userId:employee.user_id})
        
            socket.on('push notification', data => {
                let notif = new Notification(data.message)
                notif.onclick = (ev) => {
                    ev.preventDefault()
                    window.open(data.url)
                }
            })
        });
    }
})