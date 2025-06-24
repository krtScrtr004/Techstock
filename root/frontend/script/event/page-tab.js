import { redirect } from '../utility/redirect.js'

const urlParam = new URLSearchParams(window.location.search)
const pageNumber = parseInt(urlParam.get('page') ?? 1)

const pageTabWrapper = document.querySelector('.page-tab')
const buttons = pageTabWrapper.querySelectorAll('img')
const tabs = pageTabWrapper.querySelectorAll('p')

const maxPage = 10

tabs[pageNumber - 1].classList.add('active')

tabs.forEach((tab, index) => {
    if (index !== (pageNumber - 1)) {
        tab.addEventListener('click', e => {
            e.stopPropagation()
            if (index === 0) {
                redirect.redirectToHome()
            } else {
                redirect.redirectToDiscoverMore(index + 1)
            }
        })
    }
})

buttons.forEach(button => {
    button.addEventListener('click', e => {
        e.stopPropagation()
        if (button.classList.contains('previous')) {
            if (pageNumber === 1) {
                redirect.redirectToDiscoverMore(maxPage)
            } else if (pageNumber === 2) {
                redirect.redirectToHome()
            } else {
                redirect.redirectToDiscoverMore(pageNumber - 1)
            }
        } else {
            if (pageNumber === maxPage) {
                redirect.redirectToHome()
            } else {
                redirect.redirectToDiscoverMore(pageNumber + 1)
            }
        }
    })
})
