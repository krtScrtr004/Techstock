import { shared } from './utility.js'

try {
    function resetMessagesContainer(card) {
        shared.state.offset = 0

        card.classList.toggle('active')
        if (shared.state.lastActiveChat) {
            shared.state.lastActiveChat.classList.toggle('active')
        }
        shared.state.lastActiveChat = card

        shared.messagesContainer.innerHTML = ''

        const messageErrorOccurred = shared.chatContent.querySelector('.message-error-occurred')
        if (!messageErrorOccurred?.classList.contains('no-display')) {
            messageErrorOccurred.classList.add('no-display')
        }

        const selectChatWall = shared.chatContent.querySelector('.select-chat-wall')
        if (!selectChatWall?.classList.contains('no-display')) {
            selectChatWall.classList.add('no-display')
        }
    }

    function toggleMoreOptions() {
        const moreOptionsButton = shared.chatContentHeading.querySelector('.more-options > button')
        const dropdown = shared.chatContentHeading.querySelector('.more-options .dropdown')

        if (moreOptionsButton && dropdown) {
            moreOptionsButton.addEventListener('click', e => {
                e.preventDefault()
                dropdown.classList.toggle('no-display')
            })

            document.addEventListener('click', e => {
                // Hide dropdown if click is outside the button and dropdown
                if (!moreOptionsButton.contains(e.target) && !dropdown.contains(e.target)) {
                    dropdown.classList.add('no-display')
                }
            })
        }
    }

    function updateHeading(card) {
        const otherPartyId = card.querySelector('#other_party_id').value
        const otherPartyName = card.querySelector('#other_party_name').innerText
        const otherPartyImage = card.querySelector('.other-party-image').src

        // Change content of the chat content heading
        const id = shared.chatContentHeading.querySelector('.other-party-id')
        const name = shared.chatContentHeading.querySelector('.other-party-name')
        const image = shared.chatContentHeading.querySelector('.other-party-image')
        id.innerText = otherPartyId
        name.innerText = otherPartyName
        image.src = otherPartyImage
    }

    function loadOldMessages() {
        if (!shared.state.observer) {
            shared.state.observer = new IntersectionObserver(entries => {
                entries.forEach(async entry => {
                    if (entry.isIntersecting && !shared.state.isLoading) {
                        const el = entry.target
                        if (shared.state.lastActiveChat) {
                            const oldScrollHeight = shared.messagesArea.scrollHeight

                            shared.loader.lead(shared.messagesContainer)
                            const chatSessionId = shared.state.lastActiveChat.getAttribute('data-id')
                            await shared.loadMessages(chatSessionId, true)
                            shared.loader.delete()

                            const newScrollHeight = shared.messagesArea.scrollHeight
                            shared.messagesArea.scrollTop = newScrollHeight - oldScrollHeight
                        }
                    }
                })
            })
        }
        if (shared.sentinel) {
            shared.state.observer?.observe(shared.sentinel)
        }
    }

    const chatListCards = shared.wrapper.querySelectorAll('.chat-list-card')
    chatListCards.forEach(card => {
        card.addEventListener('click', shared.debounce(async e => {
            e.preventDefault()

            resetMessagesContainer(card)
            updateHeading(card)

            // Load initial messages
            shared.loader.full(shared.messagesArea)
            const chatSessionId = card.getAttribute('data-id')
            await shared.loadMessages(chatSessionId)
            shared.loader.delete()

            shared.messagesArea.scrollTop = shared.messagesArea.scrollHeight

            loadOldMessages()
        }, 300))
    })

    toggleMoreOptions()
} catch (error) {
    shared.dialog.errorOccurred(error.message)
    console.error(error)
}