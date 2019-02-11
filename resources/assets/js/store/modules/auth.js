import jwt from 'jsonwebtoken'
import {HTTP} from "../../http-comon";
import store from "../index";
import axios from 'axios'
const state = {
  logged: false,
  failedAuth: false,
  user: {
    name: '',
    email: '',
    role: ''
  },
  processing: false
}

const getters = {
  logged: state => {
    return state.logged
  },
  user: state => {
    return state.user
  },
  failedAuth: state => {
    return state.failedAuth
  },
  processing: state => {
    return state.processing
  },
  role: state=> {
    return state.user.role
  }
}

const actions = {
  login ({commit}, loginData) {
    commit('PROCESSING')
    HTTP.post('/auth/login', loginData)
      .then(result => {
        // console.log(result.data.access_token)
        jwt.verify(result.data.access_token, 'mXoRMQllBhPGi7ENpNlWwg3IVzC8vkuF', error => {
          if(!error) {
            localStorage.setItem('token', result.data.access_token)
            store.dispatch('dispatchToken',result.data.access_token)
            commit('PROCESSING')
            commit('LOGGED')
          }
        })
      }).catch(error => {
        console.log(error)
        if(!(error.response.status) || error.response.status === 401){
          state.failedAuth = true
          commit('PROCESSING')
        }
    })
  },
  socialLogin ({commit}, info) {
    const api = axios.create({
      baseURL: 'http://localhost:8000/api',
      headers: {
        'Content-Type': 'application/json',
        'Accept':'application/json'

      }
    })
    HTTP.get(`/auth/${info.provider}/callback?code=${info.code}`)
      .then(result => {
        // console.log(result.data.access_token)
        jwt.verify(result.data.access_token, 'mXoRMQllBhPGi7ENpNlWwg3IVzC8vkuF', error => {
          if(!error) {
            localStorage.setItem('token', result.data.access_token)
            // window.opener.store = store
            store.dispatch('dispatchToken',result.data.access_token)
            commit('PROCESSING')
            commit('LOGGED')
          }
        })
      }).catch(error => {
      console.log(error)
      /*if(!(error.response.status) || error.response.status === 401){
        state.failedAuth = true
        commit('PROCESSING')
      }*/

    })

  },
  logout ({commit}){
    HTTP.post('/auth/logout')
      .then(result => {
            localStorage.removeItem('token')
            commit('LOGOUT')
      })
  },
  dispatchToken({commit},token) {
    let decoded = jwt.decode(token)
    state.user.email = decoded.email
    state.user.name = decoded.name
    state.user.role = decoded.roles[0].name
  },
  refresh({commit}){
    HTTP.post('/auth/refresh')
      .then(result => {
        // console.log(result.data.access_token)
        jwt.verify(result.data.access_token, 'mXoRMQllBhPGi7ENpNlWwg3IVzC8vkuF', error => {
          if(!error) {
            localStorage.setItem('token', result.data.access_token)
            store.dispatch('dispatchToken',result.data.access_token)
          }
        })
      }).catch(error => {
      console.log(error)
    })
  }
}

const mutations = {
  LOGGED (state) {
    state.logged = true
  },
  LOGOUT (state) {
    state.logged = false
  },
  PROCESSING (state) {
    state.processing = !state.logged
  }
}


export default {
  state,
  getters,
  actions,
  mutations
}