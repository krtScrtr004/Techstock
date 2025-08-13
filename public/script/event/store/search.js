import { shared } from './utility.js'
const {
    infiniteList,
    productList,
    sentinel,
    state,
    getResponse,
    resetList,
    insertProductCards,
    Loader,
    Dialog
} = shared

try {
    const form = document.querySelector('.search-store-form')
    if (form) {
        const button = form.querySelector('.search-store-button')
        button?.addEventListener('click', async e => {
            e.preventDefault()

            state.observer?.unobserve(sentinel)

            const inputSearch = form.querySelector('#search_store').value

            Loader.full(productList)
            await getResponse((response) => {
                resetList()

                insertProductCards(response.data)
                state.collectionName = ''
            }, inputSearch)
            Loader.delete()

            const resultGrid = infiniteList?.querySelector('.result-grid')
            resultGrid.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            })
            state.observer?.observe(sentinel)
        })
    }
} catch (error) {
    Dialog.errorOccurred(error.message)
    console.error(error)
}