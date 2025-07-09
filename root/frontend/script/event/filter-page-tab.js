import { displayPagination } from '../utility/display-pagination.js'
import { http } from '../utility/http.js'

const maxPage = 10
let pageNumber = 1

const ratings = document.querySelector('#ratings')
const ratingList = ratings.querySelector('.rating-list > .list')

function createSearchParam() {
    const checkedCheckboxes = ratings.querySelectorAll('input[type="checkbox"]:checked')

    const checkedFilters = Array.from(checkedCheckboxes).map(ch => ch.value)

    const searchParam = new URLSearchParams({
        'rating-level': checkedFilters
    })
    return searchParam.toString()
}

async function redirectHandler(page) {
    const endpoint = `dump/api/rating-card${createSearchParam()}`

    ratingList.innerHTML = '' // Remove all contents
    
    const response = await http.GET(endpoint) // TODO
    if (response) {
        response.ratingCards.forEach(html => {
            ratingList.insertAdjacentHTML('beforeend', html);
        })
    }

    ratings.scrollIntoView({
        behavior: 'smooth',
        block: 'start',
        inline: 'nearest'
    });

    pageNumber = page
    displayPagination(pageNumber, maxPage, redirectHandler)
}

displayPagination(pageNumber, maxPage, redirectHandler)
