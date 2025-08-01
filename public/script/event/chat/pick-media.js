import { exports } from './utility.js'

import { dialog } from '../../render/dialog.js'

try {
    if (exports.form) {
        exports.filePickerButtons.forEach(picker => {
            picker.addEventListener('click', e => {
                e.preventDefault()

                const hiddenInput = picker.parentElement.querySelector('input[type="file"]')
                hiddenInput.click()
            })
        })
    }
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}