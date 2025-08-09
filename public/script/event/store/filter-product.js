import { shared } from './utility.js'

try {
    const collectionButtons = shared.infiniteList.querySelectorAll('.collection-button')
    if (collectionButtons?.length > 0) {
        let lastActiveButton = collectionButtons[0]
        collectionButtons?.forEach(button => {
            button.addEventListener('click', async e => {
                e.preventDefault()

                lastActiveButton.classList.remove('active')
                button.classList.add('active')
                lastActiveButton = button

                shared.state.page = 1
                shared.state.observer.unobserve(shared.sentinel)

                shared.loader.full(shared.productList)
                await shared.getResponse((response) => {
                    if (response?.count > 0) {
                        shared.resetList()

                        shared.insertProductCards(response.data)
                        shared.collectionName = button.textContent

                    }
                })
                shared.loader.delete()

                const resultGrid = shared.infiniteList.querySelector('.result-grid')
                resultGrid.scrollIntoView({
                    behavior: 'instant',
                    block: 'start'
                })
                shared.state.observer?.observe(shared.sentinel)
            })
        })
    }
} catch (error) {
    shared.dialog.errorOccurred(error.message)
    console.error(error)
}
