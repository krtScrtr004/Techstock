import { shared } from './utility.js'

try {

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

    const chatListCards = shared.wrapper.querySelectorAll('.chat-list-card')
    chatListCards.forEach(card => {

        card.addEventListener('click', shared.debounce(async e => {
            e.preventDefault()

            shared.messagesContainer.innerHTML = ''

            const selectChatWall = shared.chatContent.querySelector('.select-chat-wall')
            if (selectChatWall && !selectChatWall.classList.contains('no-display')) {
                selectChatWall.classList.add('no-display')
            }

            updateHeading(card)

            const chatSessionId = card.getAttribute('data-id')

            // Load initial messages
            loader.full(shared.messagesContainer)
            await shared.loadMessages(chatSessionId)
            loader.delete()

            requestAnimationFrame(() => {
                shared.messagesContainer.scrollTop = shared.messagesContainer.scrollHeight
            })

            // TODO: Load previous messages
        }, 300))
    })

    toggleMoreOptions()
} catch (error) {
    shared.dialog.errorOccurred(error.message)
    console.error(error)
}