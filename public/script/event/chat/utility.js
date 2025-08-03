import { dialog } from '../../render/dialog.js'
import { loader } from '../../render/loader.js'

const Exports = () => {
    const wrapper           =   document.querySelector('.chat-wrapper')

    const chatContent       =   wrapper.querySelector('.chat-content')
    
    const writeMessageArea  =   wrapper.querySelector('.write-message-area')
    const writeMessageForm  =   writeMessageArea.querySelector('form')
    const submitButton      =   writeMessageArea.querySelector('.send-message-button')

    const message           =   writeMessageForm.querySelector('.written-message-content')

    const hiddenInputs      =   writeMessageForm.querySelectorAll('input[type="file"]')
    const filePickerButtons =   writeMessageForm.querySelectorAll('.open-file-picker-button')

    return {
        wrapper:            wrapper,
    
        chatContent:        chatContent,

        writeMessageForm:   writeMessageForm,
        submitButton:       submitButton,
        
        message:            message,

        hiddenInputs:       hiddenInputs,
        filePickerButtons:  filePickerButtons,

        dialog:             dialog,
        loader:             loader
    }
}
export const exports = Exports()