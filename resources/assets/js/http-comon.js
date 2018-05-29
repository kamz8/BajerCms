import axios from 'axios'

export const HTTP = axios.create({
  baseURL: process.env.baseURL || 'http://localhost:8000/api',
  headers: {
    'Content-Type': 'application/json',
    'Accept':'application/json'

  }
});