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
        }
    }
}
export const redirect = Redirect()