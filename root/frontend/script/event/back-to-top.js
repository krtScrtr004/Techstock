import { dialog } from '../render/dialog.js'
try {
    const backToTop = document.querySelector('.back-to-top')
    if (backToTop) {
        backToTop.addEventListener('click', e => {
            e.preventDefault()

            scrollTo({
                top: 0,
                behavior: 'smooth'
            })
        })

        window.addEventListener('scroll', () => {
            if (window.scrollY >= 1000) {
                backToTop.style.display = 'grid'
            } else {
                backToTop.style.display = 'none'
            }
        })
    }
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}
