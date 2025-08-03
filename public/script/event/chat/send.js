import { exports } from "./utility.js";

try {
    exports.submitButton.addEventListener('click', e => {
        e.preventDefault()

        const formData = new FormData()

        exports.hiddenInputs.forEach(input => {
            formData.append(input.name, input.files)
        })
        formData.append('message', exports.message.value)

        // TODO: Send form to backend
    })
} catch (error) {
    exports.dialog.errorOccurred(error.message)
    console.error(error)
}