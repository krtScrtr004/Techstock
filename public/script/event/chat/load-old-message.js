import { shared } from './utility.js';
const {
    messagesArea,
    messagesContainer,
    sentinel,
    state,
    loadMessages,
    loader,
    dialog
} = shared

try {
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
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}