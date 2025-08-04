import { dialog } from '../../render/dialog.js'
import { loader } from '../../render/loader.js'

import { debounce } from '../../utility/debounce.js'
import { http } from '../../utility/http.js'
import { displayBatch } from '../../utility/display-batch.js'

const Shared = () => {
    const limit                 =   5
    
    let lastActiveChat          =   null
    let isLoading               =   false
    let offset                  =   0
    let observer                =   null
    let selectedFiles           =   new Map

    const wrapper               =   document.querySelector('.chat-wrapper')

    const chatContent           =   wrapper.querySelector('.chat-content')
    const chatContentHeading    =   chatContent.querySelector('.chat-content-heading')
    const chatContentMain       =   chatContent.querySelector('.chat-content-main')
    
    const messagesArea          =   chatContent.querySelector('.messages-area')
    const sentinel              =   messagesArea.querySelector('.sentinel')
    const messagesContainer     =   messagesArea.querySelector('.messages-container')

    const writeMessageArea      =   wrapper.querySelector('.write-message-area')
    const writeMessageForm      =   writeMessageArea.querySelector('form')
    const submitButton          =   writeMessageArea.querySelector('.send-message-button')

    const message               =   writeMessageForm.querySelector('.written-message-content')

    const hiddenInputs          =   writeMessageForm.querySelectorAll('input[type="file"]')
    const filePickerButtons     =   writeMessageForm.querySelectorAll('.open-file-picker-button')

    return {
        get wrapper()               { return wrapper },
    
        get chatContent()           { return chatContent },
        get chatContentHeading()    { return chatContentHeading },
        get chatContentMain()       { return chatContentMain },

        get messagesArea()          { return messagesArea },
        get messagesContainer()     { return messagesContainer },
        get sentinel()              { return sentinel },

        get writeMessageArea()      { return writeMessageArea },
        get writeMessageForm()      { return writeMessageForm },
        get submitButton()          { return submitButton },
        
        get message()               { return message },

        get hiddenInputs()          { return hiddenInputs },
        get filePickerButtons()     { return filePickerButtons },

        get dialog()                { return dialog },
        get loader()                { return loader },
        get debounce()              { return debounce },

        get lastActiveChat()        { return lastActiveChat },
        set lastActiveChat(val)     { lastActiveChat = val },

        get offset()                { return offset },
        set offset(val)             { offset = val },

        get observer()              { return observer },
        set observer(val)           { observer = val },

        get isLoading()             { return isLoading },
        set isLoading(val)          { isLoading = val },

        get selectedFiles()         { return selectedFiles },
        set selectedFiles(val)      { selectedFiles = val},

        async loadMessages(id, prepend = false) {
            if (isLoading) {
                return
            }

            if (!id) {
                throw new Error('No chat session ID provided')
            }

            isLoading = true

            const endpoint = `backend/get-messages/${id}?offset=${offset}`
            const response = await http.GET(endpoint)
            if (response) {
                if (response.count > 0 && response.data) {
                    const callback = displayBatch(messagesContainer, prepend)

                    // Start at the end
                    const reverseData = response.data.slice().reverse()
                    reverseData.forEach(html => {
                        callback.flushCard(html)
                    })
                    callback.flushRemaining()
                    offset += limit
                } else {
                    this.observer.unobserve(sentinel)
                }
            }
            isLoading = false
        }
    }
}
export const shared = Shared()