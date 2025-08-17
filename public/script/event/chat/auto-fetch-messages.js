import { shared } from "./utility.js";
const {
    messagesArea,
    messagesContainer,
    newMessageButton,
    sentinel,
    loadMessages,
    state,
    Dialog
} = shared

try {
    // Store interval ID so we can clear it on error
    let intervalId = setInterval(async () => {
        if (!state.lastActiveChat) {
            return
        }

        try {
            // Check if the user's view scrolled first
            let isViewScrolled = false
            if (messagesArea.scrollTop + messagesArea.clientHeight < messagesArea.scrollHeight - 5) {
                isViewScrolled = true;
            }

            const chatSessionId = state.lastActiveChat.getAttribute('data-id')
            // await loadMessages(chatSessionId)

            // If view is scrolled, show button to go to the bottom
            // if (isViewScrolled && !newMessageButton?.classList.toggle('no-display')) {
            //     newMessageButton.classList.add('center-child')
            // } else {
            //     messagesArea.scrollTop = messagesArea.scrollHeight
            // }
        } catch (error) {
            const html = `
                <p 
                    class="center-text red-text"
                    style="width: 100%; margin-bottom: 10px"
                >
                    An error occurred while fetching messages!
                </p>
            `
            messagesContainer?.insertAdjacentHTML('beforeend', html)
            messagesArea.scrollTop = messagesArea.scrollHeight

            state.observer?.unobserve(sentinel)

            console.error(error)
            clearInterval(intervalId) // Stop the interval on error
        }
    }, 10000)
} catch (error) {
    Dialog.errorOccurred(error.message)
    console.error(error)
}