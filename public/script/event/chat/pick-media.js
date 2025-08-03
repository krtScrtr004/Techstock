import { exports } from './utility.js'

try {
    if (exports.writeMessageForm) {
        exports.filePickerButtons.forEach(picker => {
            picker.addEventListener('click', e => {
                e.preventDefault()

                const hiddenInput = picker.parentElement.querySelector('input[type="file"]')
                hiddenInput.click()
            })
        })
    }
} catch (error) {
    exports.dialog.errorOccurred(error.message)
    console.error(error)
}