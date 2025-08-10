export const redirect = (() => {
    function redirectTo(page) {
        window.location.href = `/Techstock/${page}`
    }

    return {
        redirectToLogin: () => {
            redirectTo('login')
        },

        redirectToSignup: () => {
            redirectTo('signup')
        },

        redirectToHome: () => {
            redirectTo('home')
        },

        redirectToDiscoverMore: (page) => {
            if (page === 1) {
                redirectTo('home#discover-more')
            } else {
                redirectTo(`discover-more?page=${page}`)
            }
        },

        redirectToSearch: (q, page) => {
            if (q.has('page')) {
                q.set('page', page)
            } else {
                // If there is no page on search query, that means user is in page 1
                // Therefore, using the next button there would redirect on the 2nd page
                q.append('page', 2) 
            }
            redirectTo(`search?${q.toString()}`)
        },

        redirectToStore: (storeName) => {
            const slug = storeName.replace(' ', '-')
            redirectTo(`store/${slug}`)
        }
    }
})()
