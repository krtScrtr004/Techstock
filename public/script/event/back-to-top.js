import { Dialog } from '../render/dialog.js'

try {
    const backToTop = document.querySelector('.back-to-top')
    backToTop?.addEventListener('click', e => {
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
} catch (error) {
    Dialog.errorOccurred(error.message)
    console.error(error)
}
