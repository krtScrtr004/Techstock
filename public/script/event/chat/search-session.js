import { shared } from './utility.js'
const {
    searchForm,
    chatList,
    debounce,
    dialog
} = shared

try {
    if (searchForm && chatList) {
        const searchBar = searchForm.querySelector('.search-chat-input')
        const chatListCards = [...chatList.querySelectorAll('.chat-list-card')]

        function handleSearch() {
            const query = searchBar.value.toLowerCase()
            chatListCards.forEach(card => {
                const nameEl = card.querySelector('.other-party-name')
                const name = nameEl?.textContent?.toLowerCase() ?? ''
                card.style.display = name.includes(query) ? 'flex' : 'none'
            })
        }

        searchBar?.addEventListener('input', debounce(handleSearch, 300))
    }
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}