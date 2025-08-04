import { displayBatch } from '../../utility/display-batch.js'
import { http } from '../../utility/http.js'

import { loader } from '../../render/loader.js'
import { dialog } from '../../render/dialog.js'

const Shared = () => {
    let page                    =   1
    let isLoading               =   false

    const infiniteList          =   document.querySelector('.infinite-list')
    const productList           =   infiniteList.querySelector('.product-grid')
    const infiniteListSentinel  =   infiniteList.querySelector('.sentinel')
    const noMoreProducts        =   infiniteList.querySelector('.no-more-products')

    const collectionName        =   infiniteList.querySelector('#collection_name').value

    return {
        page:                   page,
        isLoading:              isLoading,
        
        infiniteList:           infiniteList,
        productList:            productList,
        infiniteListSentinel:   infiniteListSentinel,

        noMoreProducts:         noMoreProducts,

        collectionName:         collectionName,

        observer:               null,

        http:                   http,
        loader:                 loader,
        dialog:                 dialog,


        getResponse:            async function (callback, search = null) {
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
                                    const callback = displayBatch(this.productList)
                                    cards.forEach(card => {
                                        callback.flushCard(card)
                                    })
                                    callback.flushRemaining()
                                },

        resetList:              function () {
                                    this.page = 1
                                    this.productList.innerHTML = ''
                                    this.noMoreProducts.style.display = 'none'
                                }
    }
}
export const shared = Shared()
