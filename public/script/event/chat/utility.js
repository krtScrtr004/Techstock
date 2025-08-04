import { dialog } from '../../render/dialog.js'
import { loader } from '../../render/loader.js'

import { debounce } from '../../utility/debounce.js'
import { http } from '../../utility/http.js'
import { displayBatch } from '../../utility/display-batch.js'

const Shared = () => {
    const limit                 =   5

    let isLoading               =   false
    let offset                  =   0

    const wrapper               =   document.querySelector('.chat-wrapper')

    const chatContent           =   wrapper.querySelector('.chat-content')
    const chatContentHeading    =   chatContent.querySelector('.chat-content-heading')
    const chatContentMain       =   chatContent.querySelector('.chat-content-main')
    const messagesContainer     =   chatContentMain.querySelector('.messages-container')

    const writeMessageArea      =   wrapper.querySelector('.write-message-area')
    const writeMessageForm      =   writeMessageArea.querySelector('form')
    const submitButton          =   writeMessageArea.querySelector('.send-message-button')

    const message               =   writeMessageForm.querySelector('.written-message-content')

    const hiddenInputs          =   writeMessageForm.querySelectorAll('input[type="file"]')
    const filePickerButtons     =   writeMessageForm.querySelectorAll('.open-file-picker-button')

    return {
        wrapper:            wrapper,
    
        chatContent:        chatContent,
        chatContentHeading: chatContentHeading,
        chatContentMain:    chatContentMain,
        messagesContainer:  messagesContainer,

        writeMessageForm:   writeMessageForm,
        submitButton:       submitButton,
        
        message:            message,

        hiddenInputs:       hiddenInputs,
        filePickerButtons:  filePickerButtons,

        dialog:             dialog,
        loader:             loader,
        debounce:           debounce,

        loadMessages:       async function (id, prepend = false) {
                                if (isLoading) {
                                    return
                                }

                                if (!id) {
                                    throw new Error('No chat session ID provided')
                                }

                                isLoading = true

                                const endpoint = `backend/get-messages/${id}`
                                const response = await http.GET(endpoint)
                                if (response && response.count) {
                                    if (response.count > 0 && response.data) {
                                        const callback = displayBatch(messagesContainer, prepend)

                                        // Start at the end
                                        const reverseData = response.data.slice().reverse()
                                        reverseData.forEach(html => {
                                            callback.flushCard(html)
                                        })
                                        callback.flushRemaining()
                                        offset += limit
                                    }
                                }
                                isLoading = false
                            },
    }
}
export const shared = Shared()