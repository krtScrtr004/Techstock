import { http } from './http.js'

import { loader } from '../render/loader.js'

const Exports = () => {
    return {
        page: 1,
        isLoading: false,
        http: http,
        loader: loader,

        infiniteList: document.querySelector('.infinite-list'),
        productList: document.querySelector('.product-grid'),
        infiniteListSentinel: document.querySelector('.sentinel'),
        noMoreProducts: document.querySelector('.no-more-products'),

        collectionName: document.querySelector('#collection_name').value,

        observer: null,

        getResponse: async function (callback, search = null) {
            if (this.isLoading) {
                return
            }
            this.isLoading = true

            let endpoint = `dump/api/store-product?page=${this.page++}&collection=${this.collectionName}`
            if (search) {
                endpoint = `${endpoint}&q=${search}`
            }

            const response = await http.GET(endpoint) // TODO
            if (response) {
                callback(response)
            }
            this.isLoading = false
        },

        insertProductCards: function (cards) {
            cards.forEach(card => {
                this.productList.insertAdjacentHTML('beforeend', card)
            })
        },

        resetList: function () {
            this.page = 1
            this.productList.innerHTML = ''
            this.noMoreProducts.style.display = 'none'
        }
    }
}
export const exports = Exports()
