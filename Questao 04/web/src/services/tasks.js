import { http } from './config'

export default {
    list: () => {
        return http.get('tasks/read.php')
    },
    save: (task) => {
        const config = {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
        let formData = new FormData();
        for (let key in task) {
            formData.append(key, task[key]);
        }

        return http.post('tasks/create.php', formData, config).then(res => {
            console.log(res)
        }).catch(err => {
            console.log(err)
        })
    },
    update: (task) => {
        const config = {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
        let formData = new FormData();
        for (let key in task) {
            formData.append(key, task[key]);
        }
        return http.post('tasks/update.php', formData, config)
    },
    delete: (id) => {
        return http.delete(`tasks/delete.php?id=${id}`)
    }
}