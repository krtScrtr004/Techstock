import { shared } from './utility.js'

try {
    // Infinite Scroll Handler
    shared.state.observer = new IntersectionObserver(entries => {
        entries.forEach(async entry => {
            if (entry.isIntersecting && !shared.state.isLoading) {

                const el = entry.target
                shared.loader.trail(shared.productList.parentElement)
                await shared.getResponse((response) => {
                    if (response.count > 0) {
                        shared.insertProductCards(response.productCards)
                    } else {
                        shared.noMoreProducts.style.display = 'block'
                        shared.state.observer?.unobserve(el)
                    }
                })
                shared.loader.delete()
            }
        })
    })
    if (shared.sentinel) {
        shared.state.observer?.observe(shared.sentinel)
    }
} catch (error) {
    shared.dialog.errorOccurred(error.message)
    console.error(error)
}
