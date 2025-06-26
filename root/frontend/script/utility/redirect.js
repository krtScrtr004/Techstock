const Redirect = () => {
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
            redirectTo(`discover-more?page=${page}`)
        },

        redirectToSearch: (q, page) => {
            if (q.has('page')) {
                q.set('page', page)
            } else {
                q.append('page', 1)
            }
            const urlParam = q.toString()
            redirectTo(`search?${urlParam}`)
        }
    }
}
export const redirect = Redirect()