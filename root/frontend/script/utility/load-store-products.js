import { http } from './http.js'

const Exports = () => {
    return {
        page: 1,
        isLoading: false,
        http: http,

        infiniteList: document.querySelector('.infinite-list'),
        productList: document.querySelector('.product-list'),
        infiniteListSentinel: document.querySelector('.sentinel'),
        noMoreProducts: document.querySelector('.no-more-products'),

        collectionName: document.querySelector('#collection_name').value,

        observer: null,

        getResponse: async function (callback) {
            if (this.isLoading) {
                return
            }
            this.isLoading = true

            const response = await http.GET(`dump/api/store-product?page=${this.page++}&collection=${this.collectionName}`) // TODO
            if (response) {
                callback(response)
            }
            this.isLoading = false
        },

        insertProductCards: function (cards) {
            cards.forEach(card => {
                this.productList.insertAdjacentHTML('beforeend', card)
            })
        }
    }
}
export const exports = Exports()
