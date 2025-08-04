import { shared } from './utility.js'

try {
    const collectionButtons = shared.infiniteList.querySelectorAll('.collection-button')
    if (collectionButtons && collectionButtons.length > 0) {
        let lastActiveButton = collectionButtons[0]
        collectionButtons.forEach(button => {
            button.addEventListener('click', async e => {
                e.preventDefault()

                lastActiveButton.classList.remove('active')
                button.classList.add('active')
                lastActiveButton = button

                shared.page = 1
                shared.observer.unobserve(shared.infiniteListSentinel)

                shared.loader.full(shared.productList)
                await shared.getResponse((response) => {
                    if (response.count && response.count > 0) {
                        shared.resetList()

                        shared.insertProductCards(response.productCards)
                        shared.collectionName = button.innerText

                    }
                })
                shared.loader.delete()

                const resultGrid = shared.infiniteList.querySelector('.result-grid')
                resultGrid.scrollIntoView({
                    behavior: 'instant',
                    block: 'start'
                })
                shared.observer.observe(shared.infiniteListSentinel)
            })
        })
    }
} catch (error) {
    shared.dialog.errorOccurred(error.message)
    console.error(error)
}
