document.addEventListener("nav-complete", () => {
    if (page.controller == "projects" && page.view == "index") {
        if (page.model.query != null) {
            $(".input#search input")[0].value = decodeURI(page.model.query);
            Search(decodeURI(page.model.query))
        } else {
            GetItems();
        }
        $(".input#search input").on('keydown', e => {
            if (e.key == "Enter") {
                let query = e.target.value;
                if (query == "")
                    GetItems();
                else
                    Search(query)

            }
        })
    } else if (page.controller == "home" && page.view == "index") {
        $(".input#search input").on('keydown', e => {
            if (e.key == "Enter") {
                let query = e.target.value;
                Navigate('projects', 'index', { show: 100, query: query })
            }
        })
    } else if (page.controller == "projects" && page.view == "project") {
        // Navigate('projects', 'project', {name: page.model.name})
        if (page.model.section == null || page.model.section == "description") {
            $("#description")[0].classList.add("selected")
            GetDescription();
        } else if (page.model.section == "versions") {
            $("#versions")[0].classList.add("selected")

        } else if (page.model.section == "documentation") {
            $("#documentation")[0].classList.add("selected")
        }
    }
})

async function GetDescription() {
    let response = await fetch(`https://api.github.com/repos/DcmanProductions/${page.model.name}/readme`)
    let json = await response.json();
    let content = atob(json.content);
    let converter = new showdown.Converter(),
        text = content,
        html = converter.makeHtml(text);
    $("#content")[0].innerHTML = html;
}

async function Search(query) {
    let headers = new Headers();
    headers.append("Authorization", "token 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");

    let response = await fetch(`https://api.github.com/search/repositories?q=${encodeURI(query)}+user:dcmanproductions`, {
        method: 'GET',
        headers: headers,
        redirect: 'follow'
    })
    let items = await response.json();
    GetItems(items.items)
}

async function GetItems(items = null) {
    let url = `https://api.github.com/users/dcmanproductions/repos?per_page=${(page.model.show == null ? 25 : page.model.show)}&page=${(page.model.page == null ? 0 : page.model.page)}`

    let headers = new Headers();
    headers.append("Authorization", "token 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");

    if (items == null) {
        let response = await fetch(url, {
            method: 'GET',
            headers: headers,
            redirect: 'follow'
        })
        items = await response.json();
    }
    let list = $("#search-items")[0]
    list.innerHTML = ""
    if (items.length == 0) {
        list.innerHTML = `<h3 class="centered" style="width: 100%; text-align: center; margin-top: 100px;">No Items Found!</h3>`;
    }
    let month_table = ["Jan", "Feb", "Mar", "April", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"]
    let day_table = ["Sun", "Mon", "Tue", "Wed", "Thru", "Fri", "Sat"]
    Array.from(items).forEach(item => {
        let time = new Date(item.updated_at)
        let time_of_day = time.toLocaleTimeString()
        let month = month_table[time.getMonth()];
        let day = day_table[time.getDay()]
        let year = time.getFullYear();
        time = `${day}, ${month} ${time.getDate()}, ${year} - ${time_of_day}`;
        let name = item.name.replaceAll("-", " ")
        let downloads = 0;
        let has_downloads = false;


        let html = `
<div class="search-item row">
    <div class="col content">
        <p class="name" onclick="Navigate('projects', 'project', {name: '${item.name}'})">${name}</p>
        <p class="last-updated">last updated: <span class="date">${time}</span></p>
        <p class="description">${item.description == null ? "No Description!" : item.description}</p>
    </div>
            `;


        fetch(item.releases_url.replace("{/id}", ""), {
            method: 'GET',
            headers: headers,
            redirect: 'follow'
        })
            .then(response => response.json())
            .then(result => {
                if (result.length > 0) {
                    has_downloads = true;
                    Array.from(result).forEach(i => {
                        Array.from(i.assets).forEach(asset => {
                            downloads += asset.download_count;
                        })
                    })
                }
            }).then(() => {


                if (has_downloads) {
                    html += `
                    <div class="col extras">
                        <div class="btn primary download">${downloads} <i class="fa fa-solid fa-download"></i></div>
                        <div class="btn primary"><i class="fa fa-solid fa-book"></i></div>
                    </div>`
                }

                html += `</div>`
                list.innerHTML += html;
            })
    })
}