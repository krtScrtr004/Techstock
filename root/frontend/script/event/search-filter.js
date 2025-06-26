import { redirect } from '../utility/redirect.js'

const searchFilterWrapper = document.querySelector('.search aside')

const clearButton = searchFilterWrapper.querySelector('button.clear')
const applyButton = searchFilterWrapper.querySelector('button.apply')

const categoryFilterForm = searchFilterWrapper.querySelector('.category-filter>form')
const ratingFilterButtons = searchFilterWrapper.querySelectorAll('.rating-filter>button')
const priceFilterForm = searchFilterWrapper.querySelector('.price-filter>form')

const filters = new Object()

ratingFilterButtons.forEach(button => {
    button.addEventListener('click', () => {
        filters.rating = button.getAttribute('data-rate')
    })
})

clearButton.addEventListener('click', e => {
    e.preventDefault()
    categoryFilterForm.reset()
    priceFilterForm.reset()
})

applyButton.addEventListener('click', e => {
    e.preventDefault()

    const checkedCategory = Array.from(
        categoryFilterForm.querySelectorAll('input[type="checkbox"]:checked')
    ).map(input => input.value)
    const minPrice = priceFilterForm.querySelector('#min_price').value
    const maxPrice = priceFilterForm.querySelector('#max_price').value

    if (checkedCategory.length > 0) {
        filters.category = checkedCategory;
    }
    if (minPrice) {
        filters.min_price = minPrice;
    }
    if (maxPrice) {
        filters.max_price = maxPrice;
    }

    redirect.redirectToSearch(new URLSearchParams(filters))
})