(() => {
    let motionTime = 10 * 1000;
    let motionTimer = setInterval(scrollNext, motionTime)
    $(".feature").on('mouseover', e => {
        // console.log(e.target + " ENTER")
        clearInterval(motionTimer)
        motionTimer = null
    })
    $(".feature").on('mouseout', e => {
        // console.log(e.target + " Exit")
        if (motionTimer == null) {
            motionTimer = setInterval(scrollNext, motionTime)
        }
    })
    function scrollNext() {
        select($(".feature[index='1']")[0])
    }
    select($(".feature[index='0']")[0])
    $(".feature .btn.secondary").on('click', e => {
        let feature = e.target.parentElement.parentElement;
        let index = Number.parseInt($(feature).attr('index'))
        if (index != 0) {
            select(feature);
            // setTimeout(() => {
            //     let pos = $(".feature[index='0']")[0].getBoundingClientRect().top;
            //     window.scrollTo(0, pos - 200)
            // }, 2000)
        } else {
            let name = $(feature).find('h2').html().toString().toLowerCase().replaceAll(' ', "-")
            window.open(`/demo/${name}`);
        }
    })
    /**
     * It switches the index of the clicked element with the index of the element with index 0.
     * @param ele - the element that was clicked
     */
    function select(ele) {
        let currentIndex = Number.parseInt($(ele).attr('index'));
        switch (currentIndex) {
            case 1:
                $(`.feature[index="2"]`).attr("index", '1')
                $(`.feature[index="0"]`).attr("index", '2')
                break;
            case 2:
                $(`.feature[index="1"]`).attr("index", '2')
                $(`.feature[index="0"]`).attr("index", '1')
                break;
            default: break;
        }

        $(ele).attr("index", "0")
        $(".feature .btn.secondary").html("Learn More")
        let demoBtn = $(ele).find('.btn.secondary')[0];
        demoBtn.innerText = "View Demo"
    }
})()