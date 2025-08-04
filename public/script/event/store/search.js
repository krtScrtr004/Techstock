import { shared } from './utility.js'

try {
    const form = document.querySelector('.search-store-form')
    if (form) {
        const button = form.querySelector('.search-store-button')
        button.addEventListener('click', async e => {
            e.preventDefault()

            shared.observer.unobserve(shared.infiniteListSentinel)

            const inputSearch = form.querySelector('#search_store').value

            shared.loader.full(shared.productList)
            await shared.getResponse((response) => {
                shared.resetList()

                shared.insertProductCards(response.productCards)
                shared.collectionName = ''
            }, inputSearch)
            shared.loader.delete()

            const resultGrid = shared.infiniteList.querySelector('.result-grid')
            resultGrid.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            })
            shared.observer.observe(shared.infiniteListSentinel)
        })
    }
} catch (error) {
    shared.dialog.errorOccurred(error.message)
    console.error(error)
}