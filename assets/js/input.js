(() => {
    $("toggle").click(e => {
        let element = $(e.target);
        if (element.attr('disabled') != null) return;
        element.attr('value', element.attr('value') != "true")
    })
})()