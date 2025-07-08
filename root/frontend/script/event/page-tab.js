import { redirect } from '../utility/redirect.js'

const productCount = 800
const maxPage = Math.ceil(productCount / 30)

const url = new URL(window.location.href)
const paths = url.pathname.split('/')

const urlParam = new URLSearchParams(window.location.search)
const pageNumber = parseInt(urlParam.get('page') ?? 1)

const pageTabWrapper = document.querySelector('.page-tab')
const previous = pageTabWrapper.querySelector('button.previous')
const next = pageTabWrapper.querySelector('button.next')

function redirectPageHandler(page) {
    switch (paths[2]) {
    case 'search': // For search page pagination
        redirect.redirectToSearch(urlParam, page)
        break

    case 'product': // For product rating pagination
        redirect.redirectToProductRatings(paths[3], page)
        break

    case 'home': // For homepage discover more pagination
    case 'discover-more': // For discover mode page pagination
        redirect.redirectToDiscoverMore(page)
        break
    }
}

function getPagination() {
    // Will hold the page numbers to display 
    const range = [] // Without dots
    const rangeWithDots = [] // With dots -> To be DISPLAYED
    
    const delta = 2 // Number of pages to show on each side of the current page
    let l // Tracks the last page number added to rangeWithDots

    for (let i = 1 ; i <= maxPage ; i++) {
        // Include the first and last page, and the pages within 'delta' of the current pageNumber
        if (i === 1 || i === maxPage || (i >= pageNumber - delta && i <= pageNumber + delta)) {
            range.push(i)
        }
    }

    // Build the final pagination array, inserting dots where needed
    for (const i of range) {
        if (l) {
            // If there's exactly one page skipped, insert that page number
            if (i - l === 2) {
                rangeWithDots.push(l + 1)
            // If more than one page is skipped, insert '...'
            } else if (i - l !== 1) {
                rangeWithDots.push('...')
            }
        }
        rangeWithDots.push(i)
        l = i
    }

    return rangeWithDots
}

function displayPageTabs() {
    const pages = getPagination()
    pages.forEach(p => {
        const btn = document.createElement('button')
        btn.textContent = p

        const number = parseInt(p)
        if (!isNaN(number)) {
            if (number === pageNumber) {
                btn.classList.add('active')
            } else {
                btn.addEventListener('click', e => {
                    e.stopPropagation()
                    redirectPageHandler(number)
                }) 
            }
        } else {
            btn.disabled = true
        }
        pageTabWrapper.appendChild(btn)
    })

}

// Display page tab buttons
displayPageTabs()
pageTabWrapper.appendChild(next) // Move the next button to the end

// Hide previous / next button when on first / last page
previous.style.display = (pageNumber === 1) ? 'none' : 'block'
next.style.display = (pageNumber === maxPage) ? 'none' : 'block'

previous.addEventListener('click', () => redirectPageHandler(pageNumber - 1))
next.addEventListener('click', () => redirectPageHandler(pageNumber + 1))
