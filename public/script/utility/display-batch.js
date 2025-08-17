function insertFragment(
    elems, 
    parentElem,
    fragmentCreatorCallback,
    prepend = false
) {
    if (!elems) {
        throw new Error('No element array defined')
    }

    if (!parentElem) {
        throw new Error('No parent element defined')
    }

    const fragment = document.createDocumentFragment()
    elems.forEach(elem => {
        fragment.append(fragmentCreatorCallback(elem))
    })
    
    if (prepend) {
        parentElem.insertBefore(fragment, parentElem.firstChild)
    } else {
        parentElem.appendChild(fragment)
    }
}

/**
 * 
 * @param {Node} parentElem - Element on which fragments are to be inserted
 * @param {function ()} fragmentCreatorCallback - A callback function that creates a fragment for the view. It takes an object / array of the element data as argument; returns a fragment
 * @param {Boolean} prepend - Determine whether the fragments are inserted at the beginning (true) or at the end (false). Default is false.
 * @returns fragment
 * 
 */
export function displayBatch(
    parentElem, 
    fragmentCreatorCallback, 
    prepend = false
) {
    if (!parentElem) {
        throw new Error('No parent element defined')
    }

    if (!fragmentCreatorCallback) {
        throw new Error('No callback function defined')
    }

    let queue = []

    function insertBatch() {
        insertFragment(queue, parentElem, fragmentCreatorCallback, prepend)
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