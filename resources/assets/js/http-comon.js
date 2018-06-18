import axios from 'axios'

export const HTTP = axios.create({
  
  baseURL: 'http://bajercms.herokuapp.com/api',
  headers: {
    'Content-Type': 'application/json',
    'Accept':'application/json'

  }
});
