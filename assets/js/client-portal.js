(() => {
    let borderWidth = 3
    let color = "#40ffaf";

    new Chart($("#page-views")[0], {
        type: "bar",
        maintainAspectRatio: false,
        responsive: true,
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
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
    new Chart($("#profit")[0], {
        type: "bar",
        maintainAspectRatio: false,
        responsive: true,
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
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

})()
