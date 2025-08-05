import { dialog } from '../../render/dialog.js'
import { loader } from '../../render/loader.js'

import { debounce } from '../../utility/debounce.js'
import { http } from '../../utility/http.js'
import { displayBatch } from '../../utility/display-batch.js'

function domMembers() {
    const wrapper = document.querySelector('.chat-wrapper')

    const chatContent = wrapper.querySelector('.chat-content')
    const chatContentHeading = chatContent.querySelector('.chat-content-heading')
    const chatContentMain = chatContent.querySelector('.chat-content-main')

    const messagesArea = chatContent.querySelector('.messages-area')
    const sentinel = messagesArea.querySelector('.sentinel')
    const messagesContainer = messagesArea.querySelector('.messages-container')

    const writeMessageArea = wrapper.querySelector('.write-message-area')
    const writeMessageForm = writeMessageArea.querySelector('form')
    const submitButton = writeMessageArea.querySelector('.send-message-button')

    const message = writeMessageForm.querySelector('.written-message-content')

    const hiddenInputs = writeMessageForm.querySelectorAll('input[type="file"]')
    const filePickerButtons = writeMessageForm.querySelectorAll('.open-file-picker-button')

    return {
        wrapper, chatContent, chatContentHeading,
        chatContentMain, messagesArea, sentinel,
        messagesContainer, writeMessageArea, writeMessageForm,
        submitButton, message, hiddenInputs, filePickerButtons
    }
}

function reactToMessage(dom) {
    const PATH = 'asset/image/icon/'

    const reactButton = dom.messagesContainer.querySelectorAll('.react-button')
    if (reactButton && reactButton.length > 0) {
        reactButton.forEach(button => {
            // Only add listener if not already added
            if (!button.dataset.listenerAdded) {
                button.addEventListener('click', e => {
                    e.preventDefault()

                    const reactCount = button.parentElement.querySelector('p')
                    const icon = button.querySelector('img')
                    const isFilled = icon.src.includes('fill')

                    icon.src = PATH + (isFilled ? "heart_empty.svg" : "heart_fill.svg")
                    reactCount.textContent = parseInt(reactCount.textContent) + (isFilled ? -1 : 1)

                    // TODO: Send to backend
                })
                button.dataset.listenerAdded = 'true'
            }
        })
    }
}

async function loadMessages(
    id,
    dom,
    state,
    prepend = false,
    limit = 5
) {
    if (!id || state.isLoading) {
        return
    }

    try {
        state.isLoading = true

        const endpoint = `backend/get-messages/${id}?offset=${state.offset}`
        const response = await http.GET(endpoint)
        if (response) {
            if (response.count > 0 && response.data) {
                const callback = displayBatch(dom.messagesContainer, prepend)

                // Start at the end
                const reverseData = response.data.slice().reverse()
                reverseData.forEach(html => {
                    callback.flushCard(html)
                })
                callback.flushRemaining()
                state.offset += limit

                reactToMessage(dom)
            } else {
                this.observer?.unobserve(sentinel)
            }
        } else {
            // 
        }
    } catch (e) {
        dialog.errorOccurred(e.message)
        console.log(e)
    } finally {
        state.isLoading = false
    }
}

export const shared = (() => {
    const dom = domMembers()
    const state = {
        lastActiveChat: null,
        isLoading: false,
        offset: 0,
        observer: null,
        selectedFiles: new Map()
    }

    return {
        ...dom,
        state,
        dialog,
        loader,
        debounce,
        loadMessages: async (id, prepend = false) => loadMessages(id, dom, state, prepend, 5)
    }
})()
