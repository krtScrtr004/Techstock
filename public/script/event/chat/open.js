import { exports } from './utility.js'

try {
    const chatContentHeading = exports.chatContent.querySelector('.chat-content-heading')

    function toggleMoreOptions() {
        const moreOptionsButton = chatContentHeading.querySelector('.more-options > button')
        const dropdown = chatContentHeading.querySelector('.more-options .dropdown')

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
        const id = chatContentHeading.querySelector('.other-party-id')
        const name = chatContentHeading.querySelector('.other-party-name')
        const image = chatContentHeading.querySelector('.other-party-image')
        id.innerText = otherPartyId
        name.innerText = otherPartyName
        image.src = otherPartyImage
    }

    const chatListCards = exports.wrapper.querySelectorAll('.chat-list-card')
    chatListCards.forEach(card => {
        card.addEventListener('click', e => {
            e.preventDefault()

            const selectChatWall = exports.chatContent.querySelector('.select-chat-wall')
            if (selectChatWall && !selectChatWall.classList.contains('no-display')) {
                selectChatWall.classList.add('no-display')
            }

            updateHeading(card)
        })
    })

    toggleMoreOptions()
} catch (error) {
    exports.dialog.errorOccurred(error.message)
    console.error(error)
}