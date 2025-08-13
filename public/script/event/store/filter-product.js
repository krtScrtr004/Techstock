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
} = shared

try {
    const collectionButtons = infiniteList.querySelectorAll('.collection-button')
    if (collectionButtons?.length > 0) {
        let lastActiveButton = collectionButtons[0]
        collectionButtons?.forEach(button => {
            button.addEventListener('click', async e => {
                e.preventDefault()

                lastActiveButton.classList.remove('active')
                button.classList.add('active')
                lastActiveButton = button

                state.page = 1
                state.observer.unobserve(sentinel)

                loader.full(productList)
                await getResponse((response) => {
                    if (response?.count > 0) {
                        resetList()

                        insertProductCards(response.data)
                        state.collectionName = button.textContent

                    }
                })
                loader.delete()

                const resultGrid = infiniteList.querySelector('.result-grid')
                resultGrid.scrollIntoView({
                    behavior: 'instant',
                    block: 'start'
                })
                state.observer?.observe(sentinel)
            })
        })
    }
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}
