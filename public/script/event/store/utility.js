import { displayBatch } from '../../utility/display-batch.js'
import { http } from '../../utility/http.js'

import { loader } from '../../render/loader.js'
import { dialog } from '../../render/dialog.js'

function domMembers() {
    const infiniteList = document.querySelector('.infinite-list')
    const productList = infiniteList?.querySelector('.product-grid')
    const sentinel = infiniteList?.querySelector('.sentinel')
    const noMoreProducts = infiniteList?.querySelector('.no-more-products')

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

function fragmentCreatorCallback(elem) {
    const fragment = document.createDocumentFragment()
    const wrapper = document.createElement('a')
    const nameSlug = elem.name?.replace(' ', '-')
    const productId = elem.id
    const storeId = elem.store?.id
    const redirectPath = `http://localhost/Techstock/product/${elem.name}-i.${productId}.${storeId}`
    wrapper.href = redirectPath

    const card = document.createElement('div')
    card.classList.add('product-card')
    card.setAttribute('data-id', productId)
    
    const image = document.createElement('img')
    image.src = elem.images[0]
    image.alt = image.title = elem.name
    image.loading = 'lazy'
    image.height = '180'
    card.append(image)

    const name = document.createElement('h3')
    name.classList.add('product-name', 'multi-line-ellipsis')
    name.title = name.textContent = elem.name
    card.append(name)

    const span = document.createElement('span')
    const price = document.createElement('p')
    price.textContent = elem.price
    const soldCount = document.createElement('p')
    soldCount.textContent = elem.soldCount
    span.append(price, soldCount)
    card.append(span)

    wrapper.append(card)

    fragment.appendChild(wrapper)
    return wrapper
}

function insertProductCards(data, dom) {
    const callback = displayBatch(dom.productList, fragmentCreatorCallback)
    data.forEach(datum => {
        callback.flushCard(datum)
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
