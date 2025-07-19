import { exports } from '../../utility/load-store-products.js'

const form = document.querySelector('.search-store-form')
if (form) {
    const button = form.querySelector('.search-store-button')
    button.addEventListener('click', async e => {
        e.preventDefault()

        exports.observer.unobserve(exports.infiniteListSentinel)

        const inputSearch = form.querySelector('#search_store').value
        await exports.getResponse((response) => {
            exports.resetList()

            exports.insertProductCards(response.productCards)
            exports.collectionName = ''
        }, inputSearch)
        
        const resultGrid = exports.infiniteList.querySelector('.result-grid')
        resultGrid.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        })
        exports.observer.observe(exports.infiniteListSentinel)
    })
}