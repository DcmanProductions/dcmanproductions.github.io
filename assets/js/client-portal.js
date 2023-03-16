(() => {
    $("input[type=password]").attr('password', true)
    $("toggle#show-password-toggle").click(e => {
        $("input[password]").attr('type', $(e.target).attr('value') != "true" ? "password" : "text")
    })
})()