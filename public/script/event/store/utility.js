import { displayBatch } from '../../utility/display-batch.js'
import { http } from '../../utility/http.js'

import { loader } from '../../render/loader.js'
import { dialog } from '../../render/dialog.js'

function domMembers() {
    const infiniteList = document.querySelector('.infinite-list')
    const productList = infiniteList.querySelector('.product-grid')
    const sentinel = infiniteList.querySelector('.sentinel')
    const noMoreProducts = infiniteList.querySelector('.no-more-products')

    return {
        infiniteList,
        productList,
        sentinel,
        noMoreProducts
    }
}

async function getResponse(callback, state, search = null) {
    if (state.isLoading) {
        return
    }
    state.isLoading = true

    let endpoint = `dump/api/store-product?page=${state.page++}&collection=${state.collectionName}`
    if (search) {
        endpoint = `${endpoint}&q=${search}`
    }

    const response = await http.GET(endpoint) // TODO
    if (response) {
        callback(response)
    }
    state.isLoading = false
}

function insertProductCards(cards, dom) {
    const callback = displayBatch(dom.productList)
    cards.forEach(card => {
        callback.flushCard(card)
    })
    callback.flushRemaining()
}

function resetList(state, dom) {
    state.page = 1
    dom.productList.innerHTML = ''
    dom.noMoreProducts.style.display = 'none'
}

export const shared = (() => {
    const dom = domMembers()
    const state = {
        page: 1,
        isLoading: false,
        observer: null,
        collectionName: dom.infiniteList.querySelector('#collection_name').value
    }

    return {
        ...dom,
        state,
        http,
        loader,
        dialog,
        getResponse: async (callback, search = null) => getResponse(callback, state, search),
        insertProductCards: (cards) => insertProductCards(cards, dom),
        resetList: () => resetList(state, dom)
    }
})()
