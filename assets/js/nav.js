(() => {
    $(document).on('scroll', updateNav)
    let nav = $("nav")
    updateNav();


    $("#scroll-indicator").click(() => {
        // It scrolls the window by the height of the screen minus 200px. 
        window.scrollBy(0, window.screen.availHeight - 200);
    });

    $("#mobile-toggle").click(() => {
        let expand = nav.attr('mobile-expand') != "true";
        nav.attr('mobile-expand', expand)
        if (expand) {
            $("body").css('overflow', "hidden")
        }else{
            $("body").css('overflow', "")
        }
    })


    /**
     * If the navbar is not static, and the window is scrolled more than 50px, collapse the navbar
     */
    function updateNav() {
        if (nav.attr('static') == null) {
            if (window.scrollY <= 50) {
                nav.attr("collapsed", false);
            } else {
                nav.attr("collapsed", true);
            }
        }
    }

})()