import { shared } from './utility.js'

try {
    if (shared.writeMessageForm) {
        shared.filePickerButtons.forEach(picker => {
            picker.addEventListener('click', e => {
                e.preventDefault()

                const hiddenInput = picker.parentElement.querySelector('input[type="file"]')
                hiddenInput.click()
            })
        })
    }
} catch (error) {
    shared.dialog.errorOccurred(error.message)
    console.error(error)
}