import axios from 'axios'

export const HTTP = axios.create({
    baseURL: 'localhost:8000'
});