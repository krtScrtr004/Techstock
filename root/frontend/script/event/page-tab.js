import { displayPagination } from '../utility/display-pagination.js'
import { redirect } from '../utility/redirect.js'

import { dialog } from '../render/dialog.js'

try {
    const productCount = 800
    const maxPage = Math.ceil(productCount / 30)

    const url = new URL(window.location.href)
    const paths = url.pathname.split('/')

    const urlParam = new URLSearchParams(window.location.search)
    const pageNumber = parseInt(urlParam.get('page') ?? 1)

    function redirectHandler(page) {
        switch (paths[2]) {
        case 'search': // For search page pagination
            redirect.redirectToSearch(urlParam, page)
            break

        case 'home': // For homepage discover more pagination
        case 'discover-more': // For discover mode page pagination
            redirect.redirectToDiscoverMore(page)
            break
        }
    }

    // Display page tab buttons
    displayPagination(pageNumber, maxPage, redirectHandler)
} catch (error) {
    dialog.errorOccurred(error.message)
}
