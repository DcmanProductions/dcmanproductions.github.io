(() => {


    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    let today = new Date();
    let currentMonth = today.getMonth();
    let currentYear = today.getFullYear();

    /**
     * It creates a table row for each week of the month, and a table cell for each day of the week.
     * @param month - The month to display.
     * @param year - The year to display in the calendar.
     * @param calendar - This is the calendar that is being loaded
     */
    function showCalendar(month, year, calendar) {
        const firstDay = new Date(year, month).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const calendarBody = $(calendar).find(".calendar-body");


        $(calendar).find(".month").text(`${months[month]} ${year}`);

        let date = 1;
        let rows = '';

        /* Creating a table row for each week of the month, and a table cell for each day of the week. */
        for (let i = 0; i < 6; i++) {
            let row = '<tr>';

            /* This is the code that creates the calendar. It creates a table row for each week of the
            month, and a table cell for each day of the week. */
            for (let j = 0; j < 7; j++) {
                if (i === 0 && j < firstDay) {
                    row += '<td></td>';
                } else if (date > daysInMonth) {
                    break;
                } else {
                    const isToday = (month === currentMonth && year === currentYear && date === today.getDate());
                    const cellClass = isToday ? 'today' : '';
                    row += `<td class="${cellClass}">${date}</td>`;
                    date++;
                }
            }

            row += '</tr>';
            rows += row;
        }

        calendarBody.html(rows);
    }

    /**
     * If the current month is January, then the current year is decremented by one and the current month
     * is set to December. Otherwise, the current month is decremented by one.
     */

    function prevMonth(calendar) {
        currentYear = currentMonth === 0 ? currentYear - 1 : currentYear;
        currentMonth = currentMonth === 0 ? 11 : currentMonth - 1;
        showCalendar(currentMonth, currentYear, calendar);
    }

    /**
     * If the current month is December, then the next month is January of the next year, otherwise the
     * next month is the next month of the current year
     */
    function nextMonth(calendar) {
        currentYear = currentMonth === 11 ? currentYear + 1 : currentYear;
        currentMonth = currentMonth === 11 ? 0 : currentMonth + 1;
        showCalendar(currentMonth, currentYear, calendar);
    }

    function createCalendarDOM(calendar) {

        /* Creating the header of the calendar. */
        let header = document.createElement("div")
        header.classList.add("header")

        let prevButton = document.createElement("button")
        prevButton.classList.add("prev", "secondary")
        prevButton.innerHTML = `<i class="fa fa-chevron-left"></i>`

        let nextButton = document.createElement("button")
        nextButton.classList.add("next", "secondary")
        nextButton.innerHTML = `<i class="fa fa-chevron-right"></i>`

        let month = document.createElement('p')
        month.classList.add("month");

        header.appendChild(prevButton)
        header.appendChild(month)
        header.appendChild(nextButton)
        calendar.appendChild(header);


        /* Creating a table with the days of the week as the header. */
        let table = document.createElement("table")
        let thread = document.createElement("thead")
        let daysRow = document.createElement('tr')
        let days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",]

        days.forEach(day => {
            let dayHeader = document.createElement("th")
            dayHeader.innerText = day;
            daysRow.appendChild(dayHeader)
        })
        thread.appendChild(daysRow)
        table.appendChild(thread)

        /* Creating a table body element and adding it to the table. */
        let calendarBody = document.createElement("tbody")
        calendarBody.classList.add("calendar-body")
        table.appendChild(calendarBody)

        calendar.appendChild(table)


        /* Adding an event listener to the buttons. */
        $(prevButton).click(() => prevMonth(calendar));
        $(nextButton).click(() => nextMonth(calendar));

        showCalendar(currentMonth, currentYear, calendar);
    }

    $(".calendar").each((_, element) => createCalendarDOM(element))


})()