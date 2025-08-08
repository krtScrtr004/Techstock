import { shared } from "./utility.js";

try {
    // Store interval ID so we can clear it on error
    let intervalId = setInterval(async () => {
        if (!shared.state.lastActiveChat) {
            return
        }

        try {
            // Check if the user's view scrolled first
            let isViewScrolled = false
            if (shared.messagesArea.scrollTop + shared.messagesArea.clientHeight < shared.messagesArea.scrollHeight - 5) {
                isViewScrolled = true;
            }

            const chatSessionId = shared.state.lastActiveChat.getAttribute('data-id')
            // await shared.loadMessages(chatSessionId)

            // If view is scrolled, show button to go to the bottom
            // if (isViewScrolled && !shared.newMessageButton?.classList.toggle('no-display')) {
            //     shared.newMessageButton.classList.add('center-child')
            // } else {
            //     shared.messagesArea.scrollTop = shared.messagesArea.scrollHeight
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
            shared.messagesContainer?.insertAdjacentHTML('beforeend', html)
            shared.messagesArea.scrollTop = shared.messagesArea.scrollHeight

            shared.state.observer?.unobserve(shared.sentinel)

            console.error(error)
            clearInterval(intervalId) // Stop the interval on error
        }
    }, 10000)
} catch (error) {
    shared.dialog.errorOccurred()
}