const Http = () => {
    const apiUrl = 'http://localhost/Techstock/'

    return {
        GET: async (endpoint) => {
            try {
                const request = await fetch(`${apiUrl}${endpoint}`)
                if (!request.ok) {
                    throw new Error(`HTTP error! Status: ${request.status} ${request.statusText}`);
                }

                const contentType = request.headers.get('content-type')
                if (!contentType || !contentType.includes('application/json')) {
                    throw new Error('Expected JSON, but got non-JSON response')
                }

                return await request.json()
            } catch (error) {
                console.log(error)
            }
        },

        POST: async (endpoint, body = null) => {
            try {
                const request = await fetch(`${apiUrl}${endpoint}`, {
                    method: 'POST',
                    header: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(body)
                })

                if (!request.ok) {
                    throw new Error(`HTTP error! Status: ${request.status} ${request.statusText}`)
                }

                const contentType = request.headers.get('content-type')
                if (!contentType || !contentType.includes('application/json')) {
                    throw new Error('Expected JSON, but got non-JSON response')
                }

                return await request.json()
            } catch (error) {
                console.log(error)
            }
        }
    }
}
export const http = Http()