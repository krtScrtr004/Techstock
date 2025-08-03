import { insertFragment } from './insert-fragment.js'

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