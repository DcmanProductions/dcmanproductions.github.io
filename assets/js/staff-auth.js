(() => {
    $("input[type=password]").attr('password', true)
    $("toggle#show-password-toggle").click(e => {
        $("input[password]").attr('type', $(e.target).attr('value') != "true" ? "password" : "text")
    })
    $("form#staff-registration-form.form input#password").keyup(validateForm)
    $("form#staff-registration-form.form input#confirm-password").keyup(validateForm)
    function validateForm() {
        if ($("input#password").val() != $("input#confirm-password").val()) {
            $("p.error").html("Passwords must match!")
            $("input#password").addClass("error")
            $("input#confirm-password").addClass("error")
            return false
        } else {
            $("input#password").removeClass("error")
            $("input#confirm-password").removeClass("error")
            $("p.error").html("")
            return true
        }
    }
    $("form#staff-registration-form.form .btn.primary").click(async () => {
        $("p.error").html("")
        if (validateForm()) {
            let response = await register($("form#staff-registration-form.form")[0])
            if (response.successful) {
                window.location.href = "/staff-portal"
            } else {
                $("p.error").html(response.message);
            }
        }
    })

    $("#login-form .btn.primary").click(async () => {
        $("p.error").html("")
        $("#login-form .btn.primary").attr('disabled', "true")
        let username = $("#login-form input#username").val();
        let password = $("#login-form input#password").val();
        let remember = $("#login-form toggle#remember-me-toggle").attr('value') == "true"
        let response = await login(username, password, remember)
        if (response.successful) {
            window.location.href = "/staff-portal"
        } else {
            $("p.error").html(response.message)
        }
        setTimeout(() => {
            $("#login-form .btn.primary").attr('disabled', null)
        }, 2 * 1000)
    })
})();
/**
 * It takes a form, sends it to a PHP script, and if the PHP script returns a JSON object with no
 * error, it logs the user in.
 * @param {HTMLFormElement} form - The form element that contains the data to be sent to the server.
 * @returns if registration of successful.
 */
async function register(form) {
    let data = new FormData(form);
    let response = await fetch("/assets/php/auth.php?c=staff&s=lfinteractive&m=register", { method: "POST", body: data })
    if (response.ok) {
        let json = await response.json();
        if (json["error"] == null) {
            await login(data["email"], data['password'], false)
            return {
                successful: true,
                message: ""
            };
        } else {
            return {
                successful: false,
                message: json["error"]
            };
        }
    }
    return {
        successful: true,
        message: ""
    };;
}
/**
 * It takes a username, password, and a boolean value, and sends a POST request to a PHP script, which
 * returns a JSON object. If the JSON object doesn't contain an error, it sets two cookies.
 * @param {string}username - The username of the user
 * @param {string}password - The password of the user.
 * @param {boolean}remember - if the user should be remembered
 */
async function login(username, password, remember) {
    let data = new FormData();
    data.append("username", username)
    data.append("password", password)
    let response = await fetch("/assets/php/auth.php?c=staff&s=lfinteractive&m=login", { method: "POST", body: data })
    if (response.ok) {
        let json = await response.json();
        if (json["error"] == null) {
            let token = json["token"];
            if (remember) {
                let expires = new Date(3000, 0).toUTCString();
                document.cookie = `auth_username=${username};expires='${expires}';path=/`
                document.cookie = `auth_token=${token};expires='${expires}'; path=/`
            } else {
                document.cookie = `auth_username=${username}; path=/`
                document.cookie = `auth_token=${token}; path=/`
            }
            return {
                successful: true,
                message: ""
            };
        }
        return {
            successful: false,
            message: json["error"]
        };
    }
}

function Logout() {
    document.cookie = `auth_username=; expires=${new Date(2000).toUTCString()};path=/`
    document.cookie = `auth_token=; expires=${new Date(2000).toUTCString()}; path=/`
}