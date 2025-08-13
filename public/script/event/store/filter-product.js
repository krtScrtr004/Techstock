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
    const collectionButtons = infiniteList.querySelectorAll('.collection-button')
    if (collectionButtons?.length > 0) {
        let lastActiveButton = collectionButtons[0]
        collectionButtons.forEach(button => {
            button.addEventListener('click', async e => {
                e.preventDefault()

                lastActiveButton.classList.remove('active')
                button.classList.add('active')
                lastActiveButton = button

                state.page = 1
                state.observer.unobserve(sentinel)

                Loader.full(productList)
                await getResponse((response) => {
                    if (response?.count > 0) {
                        resetList()

                        insertProductCards(response.data)
                        state.collectionName = button.textContent

                    }
                })
                Loader.delete()

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
    Dialog.errorOccurred(error.message)
    console.error(error)
}
