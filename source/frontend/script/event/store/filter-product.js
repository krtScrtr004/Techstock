import { exports } from '../../utility/load-store-products.js'

import { dialog } from '../../render/dialog.js'

try {
    const collectionButtons = exports.infiniteList.querySelectorAll('.collection-button')
    if (collectionButtons && collectionButtons.length > 0) {
        let lastActiveButton = collectionButtons[0]
        collectionButtons.forEach(button => {
            button.addEventListener('click', async e => {
                e.preventDefault()

                lastActiveButton.classList.remove('active')
                button.classList.add('active')
                lastActiveButton = button

                exports.page = 1
                exports.observer.unobserve(exports.infiniteListSentinel)

                await exports.getResponse((response) => {
                    if (response.count && response.count > 0) {
                        exports.resetList()

                        exports.loader.full(exports.productList)

                        exports.insertProductCards(response.productCards)
                        exports.collectionName = button.innerText

                        exports.loader.delete()
                    }
                })

                const resultGrid = exports.infiniteList.querySelector('.result-grid')
                resultGrid.scrollIntoView({
                    behavior: 'instant',
                    block: 'start'
                })
                exports.observer.observe(exports.infiniteListSentinel)
            })
        })
    }
    
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}
