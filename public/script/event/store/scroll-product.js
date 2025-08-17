import { shared } from './utility.js'
const {
    productList,
    noMoreProducts,
    sentinel,
    state,
    insertProductCards,
    getResponse,
    Loader,
    Dialog
} = shared

try {
    // Infinite Scroll Handler
    state.observer = new IntersectionObserver(entries => {
        entries.forEach(async entry => {
            if (entry.isIntersecting && !state.isLoading) {

                const el = entry.target
                Loader.trail(productList.parentElement)
                await getResponse((response) => {
                    if (response.count > 0) {
                        insertProductCards(response.data)
                    } else {
                        noMoreProducts.style.display = 'block'
                        state.observer?.unobserve(el)
                    }
                })
                Loader.delete()
            }
        })
    })
    if (sentinel) {
        state.observer?.observe(sentinel)
    }
} catch (error) {
    Dialog.errorOccurred(error.message)
    console.error(error)
}
