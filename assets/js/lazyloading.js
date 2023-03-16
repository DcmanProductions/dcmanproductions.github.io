(() => {
    setTimeout(() => {
        $("#landing").attr('loaded', true)
        $("nav").attr('loaded', true)
    })

    let observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                $(entry.target).attr('loaded', true)
            } 
        })
    },
        {
            threshold: .5
        })

    /* Observing all the sections except the landing section. */
    Array.from(document.querySelectorAll("section")).forEach(section => {
        if (section.id == "landing") return;
        observer.observe(section)
    })

})()