import { messageFragmentCallback } from './messages-fragment-callback.js'

import { dialog } from '../../render/dialog.js'
import { loader } from '../../render/loader.js'
import { notification } from '../../render/notification.js'

import { simplifyDate } from '../../utility/simplify-date.js'
import { debounce } from '../../utility/debounce.js'
import { http } from '../../utility/http.js'
import { displayBatch } from '../../utility/display-batch.js'
import { redirect } from '../../utility/redirect.js'

function domMembers() {
    const wrapper = document.querySelector('.chat-wrapper')

    const aside = wrapper?.querySelector('aside')
    const searchForm = aside?.querySelector('.search-chat-form')
    const chatList = aside?.querySelector('.chat-list')

    const chatContent = wrapper?.querySelector('.chat-content')
    const chatContentHeading = chatContent?.querySelector('.chat-content-heading')
    const chatContentMain = chatContent?.querySelector('.chat-content-main')

    const messagesArea = chatContent?.querySelector('.messages-area')
    const sentinel = messagesArea?.querySelector('.sentinel')
    const messagesContainer = messagesArea?.querySelector('.messages-container')
    const newMessageButton = messagesArea?.querySelector('.new-message-button')

    const writeMessageArea = wrapper?.querySelector('.write-message-area')
    const writeMessageForm = writeMessageArea?.querySelector('form')
    const submitButton = writeMessageArea?.querySelector('.send-message-button')

    const message = writeMessageForm?.querySelector('.written-message-content')

    const hiddenInputs = writeMessageForm?.querySelectorAll('input[type="file"]')
    const filePickerButtons = writeMessageForm?.querySelectorAll('.open-file-picker-button')


    return {
        wrapper, aside, searchForm, chatList,
        chatContent, chatContentHeading,
        chatContentMain, messagesArea, sentinel, newMessageButton,
        messagesContainer, writeMessageArea, writeMessageForm,
        submitButton, message, hiddenInputs, filePickerButtons
    }
}

async function loadMessages(
    id,
    dom,
    state,
    newMessages = true,
    prepend = false,
    limit = 5
) {
    if (!id || state.isLoading) {
        return
    }

    try {
        state.isLoading = true

        const thread = newMessages ? 'new' : 'old'
        const date = newMessages ? state.newestMessageDate : state.oldestMessageDate

        const searchParams = new URLSearchParams()
        searchParams.append('thread', thread)
        searchParams.append('date', date)
        const endpoint = `backend/get-messages/${id}?${searchParams}`

        const response = await http.GET(endpoint)
        if (response) {
            if (response.count > 0) {
                const callback = displayBatch(dom.messagesContainer, messageFragmentCallback, prepend)

                // Start at the end
                const reverseData = response.data.slice().reverse()
                reverseData.forEach(datum => {
                    callback.flushCard(datum)
                })
                callback.flushRemaining()

                state.newestMessageDate = response.newestMessageDate?.date ?? null
                state.oldestMessageDate = response.oldestMessageDate?.date ?? null
            } else {
                if (state.oldestMessageDate || state.newestMessageDate) {
                    const html = `
                        <p 
                            class="center-text light-black-text"
                            style="width: 100%; margin-top: 10px"
                        >
                            No more message to load
                        </p>
                    `
                    dom.messagesContainer?.insertAdjacentHTML('afterbegin', html)
                    dom.messagesArea.scrollTop = dom.messagesArea.scrollHeight
                } else {
                    const noMessages = dom.chatContentMain.querySelector('.no-messages')
                    if (noMessages?.classList.contains('no-display')) {
                        noMessages?.classList.toggle('no-display')
                    }
                }
                state.observer?.unobserve(dom.sentinel)
            }
        } else {
            const messageErrorOccurred = dom.chatContent.querySelector('.message-error-occurred')
            if (messageErrorOccurred?.classList.contains('no-display')) {
                messageErrorOccurred.classList.remove('no-display')
            }
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
        oldestMessageDate: null, // For fetching old messages
        newestMessageDate: null, // For fetching new messages
        observer: null,
        selectedFiles: new Map()
    }

    return {
        ...dom,
        state,
        dialog,
        loader,
        debounce,
        http,
        redirect,
        displayBatch,
        notification,
        simplifyDate,
        loadMessages: async (id, newMessages = true, prepend = false) => loadMessages(id, dom, state, newMessages, prepend, 5)
    }
})()
