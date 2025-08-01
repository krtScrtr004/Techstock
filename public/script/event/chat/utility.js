const Exports = () => {
    const wrapper           =   document.querySelector('.write-message-area')
    const form              =   wrapper.querySelector('form')
    const submitButton      =   wrapper.querySelector('.send-message-button')

    const hiddenInputs      =   form.querySelectorAll('input[type="file"]')
    const filePickerButtons =   form.querySelectorAll('.open-file-picker-button')

    return {
        wrapper:            wrapper,
        form:               form,

        hiddenInputs:       hiddenInputs,
        filePickerButtons:  filePickerButtons,

        submitButton:       submitButton
    }
}
export const exports = Exports()