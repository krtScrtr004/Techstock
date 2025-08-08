import { shared } from './utility.js'

try {
    const form = document.querySelector('.search-store-form')
    if (form) {
        const button = form.querySelector('.search-store-button')
        button?.addEventListener('click', async e => {
            e.preventDefault()

            shared.state.observer?.unobserve(shared.sentinel)

            const inputSearch = form.querySelector('#search_store').value

            shared.loader.full(shared.productList)
            await shared.getResponse((response) => {
                shared.resetList()

                shared.insertProductCards(response.data)
                shared.collectionName = ''
            }, inputSearch)
            shared.loader.delete()

            const resultGrid = shared.infiniteList.querySelector('.result-grid')
            resultGrid.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            })
            shared.state.observer?.observe(shared.sentinel)
        })
    }
} catch (error) {
    shared.dialog.errorOccurred(error.message)
    console.error(error)
}