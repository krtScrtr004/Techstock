import { shared } from './utility.js'
const {
    deleteItemButtons,
    removeCheckedButton,
    getCheckedItems,
    calculateTotalPrice,
    Dialog
} = shared

function removeItemDom(elem) {
    const fieldset = elem.closest('fieldset')
    const itemInfoParent = elem.closest('.item-info')
    itemInfoParent?.remove()

    // Remove store info when no items listed
    const remainingItems = fieldset.querySelectorAll('.item-info input[type="checkbox"]')
    if (remainingItems?.length < 1) {
        fieldset?.remove()
    }

    calculateTotalPrice()
}

try {
    // TODO: SEND ITEM ID BACK TO SERVER

    // Delete Action Button
    if (deleteItemButtons?.length > 0) {
        deleteItemButtons.forEach(button => {
            button.addEventListener('click', e => {
                e.preventDefault()
                removeItemDom(button)
            })
        })
    }

    // Multiple Delete
    removeCheckedButton?.addEventListener('click', e => {
        e.preventDefault()
        const checkedItems = getCheckedItems()
        if (checkedItems.length > 0) {
            checkedItems.forEach(item => removeItemDom(item))
        }
    })
} catch (error) {
    Dialog.errorOccurred(error.message)
    console.error(error)
}