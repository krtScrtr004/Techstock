import { debounce } from '../utility/debounce.js'

function getPagination(pageNumber, maxPage) {
    // Will hold the page numbers to display 
    const range = [] // Without dots
    const rangeWithDots = [] // With dots -> To be DISPLAYED

    const delta = 2 // Number of pages to show on each side of the current page
    let l // Tracks the last page number added to rangeWithDots

    for (let i = 1; i <= maxPage; i++) {
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

export function displayPagination(pageNumber, maxPage, redirectHandler) {
    const pageTabWrapper = document.querySelector('.page-tab')

    if (maxPage <= 0) {
        pageTabWrapper.classList.remove('center-child')
        pageTabWrapper.classList.add('no-display')
        return
    }

    pageTabWrapper.innerHTML = ''

    // Create previous button
    const previous = document.createElement('button')
    previous.className = 'previous'
    previous.textContent = '<'
    previous.style.display = (pageNumber === 1) ? 'none' : 'block'
    previous.addEventListener('click', () => redirectHandler(pageNumber - 1))
    pageTabWrapper.append(previous)

    const pages = getPagination(pageNumber, maxPage)
    debounce(
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
                        redirectHandler(number)
                    })
                }
            } else {
                btn.disabled = true
            }
            pageTabWrapper.appendChild(btn)
        })
    )

    // Create next button
    const next = document.createElement('button')
    next.className = 'next'
    next.textContent = '>'
    next.style.display = (pageNumber === maxPage) ? 'none' : 'block'
    next.addEventListener('click', () => redirectHandler(pageNumber + 1))
    pageTabWrapper.appendChild(next)
}
