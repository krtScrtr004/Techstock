import { displayPagination } from '../utility/display-pagination.js'

const maxPage = 10
let pageNumber = 1

const ratings = document.querySelector('#ratings')
const redirectList = ratings.querySelector('.rating-list > .list')

function redirectHandler(page) {
    redirectList.innerHTML = `Page number: ${page}`

    ratings.scrollIntoView({
        behavior: 'smooth', 
        block: 'start', 
        inline: 'nearest'
    });
    
    pageNumber = page
    displayPagination(pageNumber, maxPage, redirectHandler)
}

displayPagination(pageNumber, maxPage, redirectHandler)
