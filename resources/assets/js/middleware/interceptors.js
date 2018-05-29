import { HTTP } from '../http-comon'
import store from '../store/index'
export default function Interceptors (router) {
  HTTP.interceptors.request.use(function (request) {
    if (localStorage.getItem('token')) {
      request.headers.Authorization = 'Bearer ' + localStorage.getItem('token')
    }
    return request
  })

  HTTP.interceptors.response.use(function (response) {
    // localStorage.setItem('token', response.headers['authorization'])
   // if(localStorage.getItem('token') && store.getters.logged) {
   //   store.dispatch('refresh')
   // }

    var data = response.data
    return response
  }, function (error) {
    // Redirect user to log in on 401 error
    if (error.response.status === 401 || error.response.status === 402 || error.response.status === 403) {
      router.push('/login')
    }
    return Promise.reject(error)
  })
}