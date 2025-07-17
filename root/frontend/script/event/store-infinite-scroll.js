import { http } from '../utility/http.js'

const infiniteList = document.querySelector('.infinite-list')

const observerOptions = {
    threshold: 1.0,
}

let isLoading = false
let page = 1
const observer = new IntersectionObserver(entries => {
    entries.forEach(async entry => {
        if (entry.isIntersecting && !isLoading) {
            isLoading = true

            const el = entry.target
            const response = await http.GET(`dump/api/store-product?page=${page++}`) // TODO
            if (response) {
                if (response.count && response.count > 0) {
                    const resultGrid = infiniteList.querySelector('.product-list')
                    response.productCards.forEach(card => {
                        resultGrid.insertAdjacentHTML('beforeend', card)
                    })
                } else {
                    const noMoreProducts = infiniteList.querySelector('.no-more-products')

                    noMoreProducts.style.display = 'block'
                    observer.unobserve(el)
                }
            }

            isLoading = false
        }
    })
}, observerOptions)

const infiniteListSentinel = infiniteList.querySelector('.sentinel')
if (infiniteListSentinel) {
    observer.observe(infiniteListSentinel)
}