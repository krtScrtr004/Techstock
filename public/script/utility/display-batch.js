function insertFragment(htmlArray, parentElem, prepend = false) {
    if (!htmlArray) {
        throw new Error('No html array defined')
    }

    if (!parentElem) {
        throw new Error('No parent element defined')
    }

    const fragment = document.createDocumentFragment()
    htmlArray.forEach(html => {
        const node = document.createRange().createContextualFragment(html)
        fragment.appendChild(node)
    })
    
    if (prepend) {
        parentElem.insertBefore(fragment, parentElem.firstChild)
    } else {
        parentElem.appendChild(fragment)
    }
}

export function displayBatch(parentElem, prepend = false) {
    if (!parentElem) {
        throw new Error('No parent element defined')
    }

    let queue = []

    function insertBatch() {
        insertFragment(queue, parentElem, prepend)
        queue = []
    }

    function flushCard(card) {
        if (queue.length >= 5) {
            insertBatch()
        } 
        queue.push(card)
    }

    return {
        flushCard: flushCard,
        flushRemaining: insertBatch
    }
}