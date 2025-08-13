import { shared } from './utility.js'
const {
    infiniteList,
    productList,
    sentinel,
    state,
    getResponse,
    resetList,
    insertProductCards,
    loader,
    dialog
} = shared

try {
    const form = document.querySelector('.search-store-form')
    if (form) {
        const button = form.querySelector('.search-store-button')
        button?.addEventListener('click', async e => {
            e.preventDefault()

            state.observer?.unobserve(sentinel)

            const inputSearch = form.querySelector('#search_store').value

            loader.full(productList)
            await getResponse((response) => {
                resetList()

                insertProductCards(response.data)
                state.collectionName = ''
            }, inputSearch)
            loader.delete()

            const resultGrid = infiniteList?.querySelector('.result-grid')
            resultGrid.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            })
            state.observer?.observe(sentinel)
        })
    }
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}