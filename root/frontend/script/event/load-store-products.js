import { http } from '../utility/http.js'

const infiniteList = document.querySelector('.infinite-list')
const productList = infiniteList.querySelector('.product-list')
const noMoreProducts = infiniteList.querySelector('.no-more-products')

let collectionName = infiniteList.querySelector('#collection_name').value

let page = 1
let isLoading = false

async function getResponse(callback) {
    if (isLoading) {
        return
    }
    isLoading = true

    const response = await http.GET(`dump/api/store-product?page=${page++}&collection=${collectionName}`) // TODO
    if (response) {
        callback(response)
    }
    isLoading = false
}

function insertProductCards(cards) {
    cards.forEach(card => {
        productList.insertAdjacentHTML('beforeend', card)
    })
}

// Infinite Scroll Handler
const observer = new IntersectionObserver(entries => {
    entries.forEach(async entry => {
        if (entry.isIntersecting && !isLoading) {
            const el = entry.target
            await getResponse((response) => {
                if (response.count && response.count > 0) {
                    insertProductCards(response.productCards)
                } else {
                    noMoreProducts.style.display = 'block'
                    observer.unobserve(el)
                }
            })
        }
    })
})

const infiniteListSentinel = infiniteList.querySelector('.sentinel')
if (infiniteListSentinel) {
    observer.observe(infiniteListSentinel)
}

// Filter Handler
const collectionButtons = infiniteList.querySelectorAll('.collection-button')
if (collectionButtons && collectionButtons.length > 0) {
    let lastActiveButton = collectionButtons[0]
    collectionButtons.forEach(button => {
        button.addEventListener('click', async e => {
            e.preventDefault()

            lastActiveButton.classList.remove('active')
            button.classList.add('active')
            lastActiveButton = button

            page = 1
            observer.unobserve(infiniteListSentinel)

            await getResponse((response) => {
                if (response.count && response.count > 0) {
                    // Reset Stats
                    productList.innerHTML = ''
                    noMoreProducts.style.display = 'none'

                    insertProductCards(response.productCards)

                    const resultGrid = infiniteList.querySelector('.result-grid')
                    resultGrid.scrollIntoView({
                        behavior: 'instant',
                        block: 'start'
                    })
                    collectionName = button.innerText
                }
            })

            observer.observe(infiniteListSentinel)
        })
    })
}
