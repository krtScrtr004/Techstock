import { dialog } from '../render/dialog.js'

try {
    const backButtons = document.querySelectorAll('.back-button')
    if (backButtons) {
        backButtons.forEach(button => {
            button.addEventListener('click', e => {
                e.stopPropagation()
                window.history.back()
            })
        })
    }
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}

