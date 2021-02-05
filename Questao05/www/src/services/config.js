import Axios from 'axios'
import config from './../config/config.json'

export const http = Axios.create({
    baseURL: config.API_URL
})