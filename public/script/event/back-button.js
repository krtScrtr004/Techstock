import { Dialog } from '../render/dialog.js'

try {
    const backButtons = document.querySelectorAll('.back-button')
    backButtons.forEach(button => {
        button.addEventListener('click', e => {
            e.stopPropagation()
            window.history.back()
        })
    })
} catch (error) {
    Dialog.errorOccurred(error.message)
    console.error(error)
}

