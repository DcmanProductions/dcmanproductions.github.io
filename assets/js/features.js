(() => {
    let tooSmall = false;
    let motionTime = 10 * 1000;
    let motionTimer = setInterval(scrollNext, motionTime)
    updateScreen()
    setInterval(updateScreen, 1 * 1000)
    function updateScreen() {
        if (screen.availWidth <= 1056) {
            clearInterval(motionTimer)
            motionTimer = null
            tooSmall = true;
            $(".feature .btn.secondary").html("View Demo")
        } else {
            if (motionTimer == null) {
                motionTimer = setInterval(scrollNext, motionTime)
            }
            select($(".feature[index='0']")[0])
            tooSmall = false;
        }
    };

    $(".feature").on('mouseover', e => {
        clearInterval(motionTimer)
        motionTimer = null
    })
    $(".feature").on('mouseout', e => {
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
        if (index != 0 && !tooSmall) {
            select(feature);
        } else {
            alert("Demo not Available yet!")
            return;
            let name = $(feature).find('h2').html().toString().toLowerCase().replaceAll(' ', "-")
            window.open(`/demo/${name}`);
        }
    })
    /**
     * It switches the index of the clicked element with the index of the element with index 0.
     * @param ele - the element that was clicked
     */
    function select(ele) {
        if (tooSmall) return;
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