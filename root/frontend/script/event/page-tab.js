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
            window.location.href = `/Techstock/${(index === 0) ? 'home' : `discover-more?page=${index + 1}`}`
        })
    }
})

buttons.forEach(button => {
    button.addEventListener('click', e => {
        e.stopPropagation()
        if (button.classList.contains('previous')) {
            window.location.href = `/Techstock/${(pageNumber === 1 || pageNumber === 2) ? 'home' : `discover-more?page=${pageNumber - 1}`}`
        } else {
            window.location.href = `/Techstock/${(pageNumber === maxPage) ? 'home' : `discover-more?page=${pageNumber + 1}`}`
        }
    })
})
