import axios from 'axios'

export const HTTP = axios.create({
  baseURL: process.env.APP_API_URL || 'http://localhost:8000/api',
  // baseURL: 'http://bajercms.herokuapp.com/api',
  headers: {
    'Content-Type': 'application/json',
    'Accept':'application/json'

  }
});