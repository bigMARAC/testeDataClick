import { http } from './config'

export default {
    list: () => {
        return http.get('socios')
    },

    save: (name, ids) => {
        return http.post('socios/register', { name, ids })
    },

    delete: (id) => {
        return http.delete(`/socios/delete/${id}`)
    }
}