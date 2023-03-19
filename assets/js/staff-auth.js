(() => {
    $("form#staff-registration-form.form .btn.primary").click(async () => {
        let ok = await register($("form#staff-registration-form.form")[0])
        if (ok) {
            window.location.href = "/staff-portal"
        }
        else {
            window.location.href = "/error?c=500"
        }
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
            return true;
        } else {
            alert(json["error"]);
        }
    }
    return false;
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
                document.cookie = `auth_username=${username}; expires=${new Date(3000).toUTCString()};path=/`
                document.cookie = `auth_token=${token}; expires=${new Date(3000).toUTCString()}; path=/`
            } else {
                document.cookie = `auth_username=${username}; path=/`
                document.cookie = `auth_token=${token}; path=/`
            }
        }
    }
}