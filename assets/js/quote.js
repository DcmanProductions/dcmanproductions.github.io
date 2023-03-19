(() => {
    $("#contact-us .form input").keyup(e => {
        if (e.originalEvent.key == "Enter")
            $("#contact-us .form #submit-quote.btn").click();
    })
    $("#contact-us .form input[required]").keyup(e => {
        let ele = $(e.target)
        if (ele.hasClass("error") && ele.val() != "") {
            ele.removeClass('error')
        }
        if (ele.val() == "") {
            ele.addClass('error')
        }
    })
    $("#contact-us .form #submit-quote.btn").click(async () => {
        let send = true;
        $("#contact-us .form input[required]").each((index, element) => {
            $(element).removeClass('error')
            if ($(element).val() == "") {
                $(element).addClass('error')
                send = false;
            }
        })
        if (send) {
            let data = new FormData($("#contact-us .form")[0])
            let response = await fetch("/assets/php/quote.php", { method: "POST", body: data });
            if (response.ok) {
                let json = await response.json();
                if (json["message"] != null) {
                    window.location.href = "/thank-you.php";
                }
            }
        }
    })
})();