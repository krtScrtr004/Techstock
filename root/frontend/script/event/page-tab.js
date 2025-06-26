import { redirect } from '../utility/redirect.js'

const url = new URL(window.location.href)
const paths = url.pathname.split('/')
const currentPath = paths[2]

const urlParam = new URLSearchParams(window.location.search)
const pageNumber = parseInt(urlParam.get('page') ?? 1)

// TODO: Make page tabs rendering dynamic

const pageTabWrapper = document.querySelector('.page-tab')
const tabs = pageTabWrapper.querySelectorAll('p')
const previous = pageTabWrapper.querySelector('img.previous')
const next = pageTabWrapper.querySelector('img.next')

// const productCount = 800
// const maxPage = Match.ceil(productCount / 30)
const maxPage = 10

// Hide previous / next button when on first / last page
previous.style.display = (pageNumber === 1) ? 'none' : 'block'
next.style.display = (pageNumber === maxPage) ? 'none' : 'block'

tabs[pageNumber - 1].classList.add('active')

const findNextHandler = (page) => {
    const nextPage = page + 1
    switch (currentPath) {
    case 'search':
        redirect.redirectToSearch(urlParam, nextPage)
        break

    case 'home':
    case 'discover-more':
        redirect.redirectToDiscoverMore(nextPage)
        break
    }
}

const findPrevHandler = (page) => {
    const prevPage = page - 1
    switch (currentPath) {
    case 'search':
        redirect.redirectToSearch(urlParam, prevPage)
        break

    case 'home':
    case 'discover-more':
        redirect.redirectToDiscoverMore(prevPage)
        break
    }
}

tabs.forEach((tab, index) => {
    if (index !== (pageNumber - 1)) {
        tab.addEventListener('click', e => {
            e.stopPropagation()

            findNextHandler(index)
        })
    }
})

previous.addEventListener('click', () => findPrevHandler(pageNumber))
next.addEventListener('click', () => findNextHandler(pageNumber))