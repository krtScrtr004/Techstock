import { shared } from './utility.js'
const {
    wrapper,
    chatContent,
    chatContentHeading,
    chatContentMain,
    messagesArea,
    messagesContainer,
    newMessageButton,
    sentinel,
    state,
    loadMessages,
    debounce,
    loader,
    dialog
} = shared

try {
    function resetMessagesContainer(card) {
        state.newestMessageDate = state.oldestMessageDate = null

        card.classList.toggle('active')
        if (state.lastActiveChat) {
            state.lastActiveChat.classList.toggle('active')
        }
        state.lastActiveChat = card

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

    function updateHeading(card) {
        const otherPartyId = card.querySelector('#other_party_id').value
        const otherPartyName = card.querySelector('#other_party_name').textContent
        const otherPartyImage = card.querySelector('.other-party-image').src

        // Change content of the chat content heading
        const id = chatContentHeading.querySelector('.other-party-id')
        const name = chatContentHeading.querySelector('.other-party-name')
        const image = chatContentHeading.querySelector('.other-party-image')
        id.textContent = otherPartyId
        name.textContent = otherPartyName
        image.src = otherPartyImage
    }

    function loadOldMessages() {
        if (!state.observer) {
            state.observer = new IntersectionObserver(entries => {
                entries.forEach(async entry => {
                    if (entry.isIntersecting && !state.isLoading) {
                        const el = entry.target
                        if (state.lastActiveChat) {
                            const oldScrollHeight = messagesArea.scrollHeight

                            loader.lead(messagesContainer)
                            const chatSessionId = state.lastActiveChat.getAttribute('data-id')
                            await loadMessages(chatSessionId, false, true)
                            loader.delete()

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

    const chatListCards = wrapper.querySelectorAll('.chat-list-card')
    chatListCards.forEach(card => {
        card.addEventListener('click', debounce(async e => {
            e.preventDefault()

            resetMessagesContainer(card)
            updateHeading(card)

            // Load initial messages
            loader.full(messagesArea)
            const chatSessionId = card.getAttribute('data-id')
            await loadMessages(chatSessionId)
            loader.delete()

            messagesArea.scrollTop = messagesArea.scrollHeight

            loadOldMessages()
        }, 300))
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
                    redirect.redirectToStore(name.textContent)
                } else if (button?.classList.contains('mute-button')) {
                    muteIcon?.classList.toggle('no-display')

                    // TODO: Send to backend
                } else if (button?.classList.contains('block-button')) {
                    e.target.textContent = (e.target.textContent.toLowerCase() === 'block') ? 'Unblock' : 'Block'
                } else if (button?.classList.contains('report-button')) {
                    if (true) {
                        dialog.reportResult(true)
                    } else {
                        dialog.reportResult(false)
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
    dialog.errorOccurred(error.message)
    console.error(error)
}