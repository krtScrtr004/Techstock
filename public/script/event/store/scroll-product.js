import { shared } from './utility.js'

try {
    // Infinite Scroll Handler
    shared.observer = new IntersectionObserver(entries => {
        entries.forEach(async entry => {
            if (entry.isIntersecting && !shared.isLoading) {

                const el = entry.target
                shared.loader.trail(shared.productList)
                await shared.getResponse((response) => {
                    if (response.count && response.count > 0) {
                        shared.insertProductCards(response.productCards)
                    } else {
                        shared.noMoreProducts.style.display = 'block'
                        shared.observer.unobserve(el)
                    }
                })
                shared.loader.delete()
            }
        })
    })
    if (shared.infiniteListSentinel) {
        shared.observer.observe(shared.infiniteListSentinel)
    }
} catch (error) {
    shared.dialog.errorOccurred(error.message)
    console.error(error)
}
