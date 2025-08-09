import { shared } from './utility.js'

try {
    function resetMessagesContainer(card) {
        shared.state.newestMessageDate = shared.state.oldestMessageDate = null

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

        const noMessages = shared.chatContentMain.querySelector('.no-messages')
        if (!noMessages?.classList.contains('no-display')) {
            noMessages?.classList.add('no-display')
        }
    }

    function updateHeading(card) {
        const otherPartyId = card.querySelector('#other_party_id').value
        const otherPartyName = card.querySelector('#other_party_name').textContent
        const otherPartyImage = card.querySelector('.other-party-image').src

        // Change content of the chat content heading
        const id = shared.chatContentHeading.querySelector('.other-party-id')
        const name = shared.chatContentHeading.querySelector('.other-party-name')
        const image = shared.chatContentHeading.querySelector('.other-party-image')
        id.textContent = otherPartyId
        name.textContent = otherPartyName
        image.src = otherPartyImage
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
        }, 300))
    })

    // Toggle More Options
    const moreOptionsButton = shared.chatContentHeading.querySelector('.more-options > button')
    const dropdown = shared.chatContentHeading.querySelector('.more-options .dropdown')

    if (moreOptionsButton && dropdown) {
        moreOptionsButton.addEventListener('click', e => {
            e.preventDefault()

            const muteIcon = shared.state.lastActiveChat?.querySelector('.mute-icon')

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
                    const name = shared.chatContentHeading.querySelector('.other-party-name')
                    shared.redirect.redirectToStore(name.textContent)
                } else if (button?.classList.contains('mute-button')) {
                    muteIcon?.classList.toggle('no-display')

                    // TODO: Send to backend
                } else if (button?.classList.contains('block-button')) {
                    e.target.textContent = (e.target.textContent.toLowerCase() === 'block') ? 'Unblock' : 'Block'
                } else if (button?.classList.contains('report-button')) {
                    if (true) {
                        shared.dialog.reportResult(true)
                    } else {
                        shared.dialog.reportResult(false)
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
    shared.newMessageButton?.addEventListener('click', e => {
        e.preventDefault()

        shared.messagesArea.scrollTop = shared.messagesArea.scrollHeight

        if (!shared.newMessageButton.classList.toggle('center-child')) {
            shared.newMessageButton.classList.add('no-display')
        }
    })
} catch (error) {
    shared.dialog.errorOccurred(error.message)
    console.error(error)
}