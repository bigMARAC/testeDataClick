import { http } from './config'

export default {
    list: () => {
        return http.get('clubes')
    },

    save: (name) => {
        return http.post('clubes', { name: name })
    },

    delete: (id) => {
        return http.delete(`clubes/${id}`)
    }
}