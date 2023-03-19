(() => {
    let scrollElement = $(".reviews-slider");
    let slides = Math.ceil(scrollElement[0].scrollWidth / window.screen.availWidth);
    let speed = slides * 20;
    let width = scrollElement[0].scrollWidth - window.screen.availWidth + 50;
    scrollElement.css('--speed', `${speed}s`)
    scrollElement.css('--width', `-${width}px`);
})()