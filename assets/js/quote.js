(() => {
    $("button#generate-token").click(async e => {
        let code = await GenerateToken()
        $("#invite-code").html(code);
        $(e.target).attr('disabled', true)

    })
    $("#invite-code").click(e => {
        let ele = $(e.target);
        if (ele.attr('disabled') != null)
            return;
            let code = ele.html();
        if (code != "") {
            ele.attr('disabled', true)
            CopyInviteCode(code)
            ele.css("--animation-speed", "3s")
            ele.css("--animation-play-state", "running")
            setTimeout(() => {
                ele.css("--animation-play-state", "paused")
                ele.css("--animation-speed", "0s")
                ele.attr('disabled', null)
            }, 3000)
        }
    })
    function CopyInviteCode(code) {
        navigator.clipboard.writeText(`https://lfinteractive.net/client-portal/register?tok=${code}`)
    }
    async function GenerateToken()
    {
        let response = await $.post("/assets/php/auth.php?c=client&m=invite&s=lfinteractive", {org: org});
        return response["code"];
    }
})()