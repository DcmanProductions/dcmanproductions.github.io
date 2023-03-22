(() => {
    let borderWidth = 3
    let color = "#40ffaf";

    let pageViewChart = new Chart($("#page-views")[0], {
        type: "bar",
        maintainAspectRatio: false,
        responsive: true,
        data: {
            labels: months,
            datasets: [
                {
                    label: "Page Views",
                    data: pageViews,
                    borderWidth: borderWidth,
                    borderColor: color,
                    backgroundColor: color,
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Page Views'
                }
            }
        }
    })
    let profitChart = new Chart($("#profit")[0], {
        type: "bar",
        maintainAspectRatio: false,
        responsive: true,
        data: {
            labels: months,
            datasets: [

                {
                    label: "Profit",
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 2000, 86, 428, 3000],
                    borderWidth: borderWidth,
                    borderColor: color,
                    backgroundColor: color,
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Website Profits'
                }
            }
        }
    })


    function resizeChart() {
        let pageViewChartContext = $("#page-views")[0].getContext('2d')
        let profitChartContext = $("#profit")[0].getContext('2d')
        pageViewChartContext.canvas.height = $("#page-view-container")[0].clientHeight;
        pageViewChartContext.canvas.width = $("#page-view-container")[0].clientWidth;
        profitChartContext.canvas.height = $("#profit-container")[0].clientHeight;
        profitChartContext.canvas.width = $("#profit-container")[0].clientWidth;
    }

    $(window).resize(resizeChart)
    resizeChart()

})()
