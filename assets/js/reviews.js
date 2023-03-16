(() => {
    let scrollElement = $(".reviews-slider");
    console.log(scrollElement[0].scrollWidth)
    let slides = Math.ceil(scrollElement[0].scrollWidth / window.screen.availWidth);
    console.log(slides)
    let speed = slides * 20;
    console.log(speed)
    let width = scrollElement[0].scrollWidth - window.screen.availWidth + 50;
    scrollElement.css('--speed', `${speed}s`)
    scrollElement.css('--width', `-${width}px`);
})()