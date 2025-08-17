import { shared } from './utility.js'
const {
    wrapper,
    chatList,
    chatContent,
    chatContentHeading,
    chatContentMain,
    messagesArea,
    messagesContainer,
    newMessageButton,
    sentinel,
    state,
    loadMessages,
    Notification,
    Redirect,
    Loader,
    Dialog
} = shared

function resetMessagesContainer() {
    state.newestMessageDate = state.oldestMessageDate = null

    messagesContainer.innerHTML = ''

    const messageErrorOccurred = chatContent.querySelector('.message-error-occurred')
    if (!messageErrorOccurred?.classList.contains('no-display')) {
        messageErrorOccurred.classList.add('no-display')
    }

    const selectChatWall = chatContent.querySelector('.select-chat-wall')
    if (!selectChatWall?.classList.contains('no-display')) {
        selectChatWall.classList.add('no-display')
    }

    const noMessages = chatContentMain.querySelector('.no-messages')
    if (!noMessages?.classList.contains('no-display')) {
        noMessages?.classList.add('no-display')
    }
}

function updateHeading(
    otherPartyId,
    otherPartyName,
    otherPartyImage
) {
    // Change content of the chat content heading
    const id = chatContentHeading.querySelector('.other-party-id')
    const name = chatContentHeading.querySelector('.other-party-name')
    const image = chatContentHeading.querySelector('.other-party-image')
    id.textContent = otherPartyId
    name.textContent = otherPartyName
    image.src = otherPartyImage
}

async function loadInitialMessages(chatSessionId = null) {
    // Load initial messages
    Loader.full(messagesArea)
    await loadMessages(chatSessionId)
    Loader.delete()

    messagesArea.scrollTop = messagesArea.scrollHeight
}

function loadOldMessages() {
    if (!state.observer) {
        state.observer = new IntersectionObserver(entries => {
            entries.forEach(async entry => {
                if (entry.isIntersecting && !state.isLoading) {
                    const el = entry.target
                    if (state.lastActiveChat) {
                        const oldScrollHeight = messagesArea.scrollHeight

                        Loader.lead(messagesContainer)
                        const chatSessionId = state.lastActiveChat.getAttribute('data-id')
                        await loadMessages(chatSessionId, false, true)
                        Loader.delete()

                        const newScrollHeight = messagesArea.scrollHeight
                        messagesArea.scrollTop = newScrollHeight - oldScrollHeight
                    }
                }
            })
        })
    }
    if (sentinel) {
        state.observer?.observe(sentinel)
    }
}

try {
    // Record existing chat sessions to map
    Array.from(chatList.children).forEach(card => {
        const id = card.getAttribute('data-id')
        if (!state.chatSessions.has(id)) {
            state.chatSessions.set(id, card)
        }
    })

    // Load conversation from chat list cards
    chatList?.addEventListener('click', e => {
        const card = e.target.closest('.chat-list-card')
        if (card) {
            const idValue = card.getAttribute('data-id')
            const chatSessionId = (idValue) ? idValue : null
            if (!chatSessionId) {
                Notification.error(
                    'An error occurred while loading your conversation.',
                    3000,
                    chatContentHeading
                )
                return
            }

            const otherPartyId = card.getAttribute('data-other-party-id')
            if (!state.chatSessions.has(otherPartyId)) {
                state.chatSessions.set(otherPartyId, card)
            }

            resetMessagesContainer()
            card.classList.toggle('active')
            if (state.lastActiveChat) {
                state.lastActiveChat.classList.toggle('active')
            }
            state.lastActiveChat = card

            const otherPartyName = card.getAttribute('data-other-party-name')
            const otherPartyImage = card.getAttribute('data-other-party-image')
            updateHeading(otherPartyId, otherPartyName, otherPartyImage)

            loadInitialMessages(chatSessionId)
            loadOldMessages()
        }
    })

    // Load conversation from chat now button
    const chatNowButton = document.querySelector('.chat-now-button')
    chatNowButton?.addEventListener('click', e => {
        e.preventDefault()

        const idValue = chatNowButton.getAttribute('data-id')
        const chatSessionId = (idValue) ? idValue : null

        // If already has chat session, open it from chat list cards 
        if (state.chatSessions.has(chatSessionId)) {
            const chatListCard = state.chatSessions.get(chatSessionId)
            chatListCard.click()
        } else if (wrapper.classList.toggle('show')) {
            // README: This is so that we can access data- attributes that are 
            // needed on BE, such as 'data-other-party-id' and 'data-other-party-type'.
            // This will be replaced once chat list card is created for this new session
            state.lastActiveChat = chatNowButton

            state.lastActiveChat?.classList.remove('active')
            wrapper.classList.remove('close')

            const name = chatNowButton.getAttribute('data-other-party-name')
            const id = chatNowButton.getAttribute('data-other-party-id')
            const image = chatNowButton.getAttribute('data-other-party-image')

            resetMessagesContainer()
            updateHeading(id, name, image)

            loadInitialMessages(chatSessionId)
            loadOldMessages()
        }
    })

    // Toggle More Options
    const moreOptionsButton = chatContentHeading.querySelector('.more-options > button')
    const dropdown = chatContentHeading.querySelector('.more-options .dropdown')

    if (moreOptionsButton && dropdown) {
        moreOptionsButton.addEventListener('click', e => {
            e.preventDefault()


            const muteIcon = state.lastActiveChat?.querySelector('.mute-icon')

            const isMuted = !muteIcon?.classList.contains('no-display')
            const dropdownMuteButton = dropdown.querySelector('.mute-button')
            dropdownMuteButton.textContent = (isMuted) ? 'Unmute' : 'Mute'

            dropdown.classList.toggle('no-display')

            dropdown.addEventListener('click', e => {
                const button = e.target.closest('button')
                if (button) {
                    e.preventDefault()
                }

                if (button?.classList.contains('view-store-button')) {
                    const name = chatContentHeading.querySelector('.other-party-name')
                    Redirect.redirectToStore(name.textContent.trim())
                } else if (button?.classList.contains('mute-button')) {
                    muteIcon?.classList.toggle('no-display')

                    // TODO: Send to backend
                } else if (button?.classList.contains('block-button')) {
                    e.target.textContent = (e.target.textContent.toLowerCase() === 'block') ? 'Unblock' : 'Block'
                } else if (button?.classList.contains('report-button')) {
                    if (true) {
                        Dialog.reportResult(true)
                    } else {
                        Dialog.reportResult(false)
                    }
                }
                dropdown.classList.toggle('no-display')
            }, { once: true })
        })

        document.addEventListener('click', e => {
            // Hide dropdown if click is outside the button and dropdown
            if (!moreOptionsButton.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('no-display')
            }
        })
    }

    // New messages button event to scroll to the bottom of the chats
    newMessageButton?.addEventListener('click', e => {
        e.preventDefault()

        messagesArea.scrollTop = messagesArea.scrollHeight

        if (!newMessageButton.classList.toggle('center-child')) {
            newMessageButton.classList.add('no-display')
        }
    })
} catch (error) {
    Dialog.errorOccurred(error.message)
    console.error(error)
}