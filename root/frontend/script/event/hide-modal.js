import { dialog } from '../render/dialog.js'

try {
    const modalWrappers = document.querySelectorAll('.modal-wrapper')
    modalWrappers.forEach(modalWrapper => {
        const buttons = modalWrapper.querySelectorAll('button.close-button, button.okay-button')
        buttons.forEach(button => {
            button.addEventListener('click', e => {
                e.preventDefault()
                if (modalWrapper.style.display !== 'none') {
                    modalWrapper.style.display = 'none'
                }
            })
        })
    })
} catch (error) {
    dialog.errorOccurred(error.message)
}