const shoppingCartForm = document.querySelector('.shopping-cart-form')

function getCheckedItems() {
    const fieldsets = shoppingCartForm.querySelectorAll('fieldset')
    const checkedItems =
        Array.from(fieldsets)
            .flatMap(fieldset => { return Array.from(fieldset.querySelectorAll('.item-info input[type="checkbox"]:checked')) })
            .map(cb => cb.closest('.item-info'))

    return checkedItems
}

function formatNumber(number) {
    const formatter = new Intl.NumberFormat('en-US', {
        style: 'decimal',
        maximumFractionDigits: 2
    })
    return formatter.format(number)
}

export function calculateTotalPrice() {


    let [totalPrice, itemCount] = [0, 0]

    const items = getCheckedItems()
    items.forEach(item => {
        const price = item.querySelector('.total-price')

        // Remove currency symbols and commas, then parse as float
        const extract = price.innerText.replace(/[^0-9.]/g, '');
        totalPrice += parseFloat(extract) || 0;

        itemCount++
    })

    const paymentSummary = shoppingCartForm.querySelector('.payment-summary')
    paymentSummary.innerHTML = `
        <p class="payment-summary">Total Orders (${formatNumber(itemCount)}): <span class="bold-text blue-text">₱ ${formatNumber(totalPrice)}</span></p>
    `
}
