import { shared } from "./utility.js";

try {
    shared.submitButton.addEventListener('click', e => {
        e.preventDefault()

        const formData = new FormData()

        shared.hiddenInputs.forEach(input => {
            formData.append(input.name, input.files)
        })
        formData.append('message', shared.message.value)

        // TODO: Send form to backend
    })
} catch (error) {
    shared.dialog.errorOccurred(error.message)
    console.error(error)
}