import { shared } from './utility.js';

try {
    if (!shared.state.observer) {
        shared.state.observer = new IntersectionObserver(entries => {
            entries.forEach(async entry => {
                if (entry.isIntersecting && !shared.state.isLoading) {
                    const el = entry.target
                    if (shared.state.lastActiveChat) {
                        const oldScrollHeight = shared.messagesArea.scrollHeight

                        shared.loader.lead(shared.messagesContainer)
                        const chatSessionId = shared.state.lastActiveChat.getAttribute('data-id')
                        await shared.loadMessages(chatSessionId, false, true)
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
} catch (error) {
    shared.dialog.errorOccurred(error.message)
    console.error(error)
}