import { exports } from '../../utility/load-store-products.js'

// Infinite Scroll Handler
exports.observer = new IntersectionObserver(entries => {
    entries.forEach(async entry => {
        if (entry.isIntersecting && !exports.isLoading) {

            const el = entry.target
            await exports.getResponse((response) => {
                exports.loader.trail(exports.productList)
                if (response.count && response.count > 0) {
                    exports.insertProductCards(response.productCards)
                } else {
                    exports.noMoreProducts.style.display = 'block'
                    exports.observer.unobserve(el)
                }
                exports.loader.delete()
            })
        }
    })
})
if (exports.infiniteListSentinel) {
    exports.observer.observe(exports.infiniteListSentinel)
}