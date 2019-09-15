import jwt from 'jsonwebtoken';
import HTTP from '../../http-comon';

const state = {
  logged: false,
  failedAuth: false,
  user: {
    name: '',
    email: '',
    role: '',
  },
  processing: false,
};

const getters = {
  logged: (state) => state.logged,
  user: (state) => state.user,
  failedAuth: (state) => state.failedAuth,
  processing: (state) => state.processing,
  role: (state) => state.user.role,
};

const actions = {
  login({ commit, dispatch }, loginData) {
    commit('PROCESSING');
    HTTP.post('/auth/login', loginData)
      .then((result) => {
        // console.log(result.data.access_token)
        jwt.verify(result.data.access_token, 'mXoRMQllBhPGi7ENpNlWwg3IVzC8vkuF', (error) => {
          if (!error) {
            localStorage.setItem('token', result.data.access_token);
            dispatch('dispatchToken', result.data.access_token, { root: true });
            commit('PROCESSING');
            commit('LOGGED');
          }
        });
      }).catch((error) => {
        console.log(error);
        if (!(error.response.status) || error.response.status === 401) {
          state.failedAuth = true;
          commit('PROCESSING');
        }
      });
  },
  socialLogin({ commit, dispatch }, info) {
    HTTP.get(`/auth/${info.provider}/callback?code=${info.code}`)
      .then((result) => {
        // console.log(result.data.access_token)
        jwt.verify(result.data.access_token, 'mXoRMQllBhPGi7ENpNlWwg3IVzC8vkuF', (error) => {
          if (!error) {
            localStorage.setItem('token', result.data.access_token);
            dispatch('dispatchToken', result.data.access_token, { root: true });
            commit('PROCESSING');
            commit('LOGGED');
          }
        });
      }).catch((error) => {
        console.log(error);
        /* if(!(error.response.status) || error.response.status === 401){
        state.failedAuth = true
        commit('PROCESSING')
      } */
      });
  },
  logout({ commit }) {
    HTTP.post('/auth/logout')
      .then(() => {
        localStorage.removeItem('token');
        commit('LOGOUT');
      });
  },
  dispatchToken(token) {
    const decoded = jwt.decode(token);
    state.user.email = decoded.email;
    state.user.name = decoded.name;
    state.user.role = decoded.roles[0].name;
  },
  refresh({ dispatch }) {
    HTTP.post('/auth/refresh')
      .then((result) => {
        // console.log(result.data.access_token)
        jwt.verify(result.data.access_token, 'mXoRMQllBhPGi7ENpNlWwg3IVzC8vkuF', (error) => {
          if (!error) {
            localStorage.setItem('token', result.data.access_token);
            dispatch('dispatchToken', result.data.access_token, { root: true });
          }
        });
      }).catch((error) => {
        console.log(error);
      });
  },
};

const mutations = {
  LOGGED(state) {
    state.logged = true;
  },
  LOGOUT(state) {
    state.logged = false;
  },
  PROCESSING(state) {
    state.processing = !state.logged;
  },
};


export default {
  state,
  getters,
  actions,
  mutations,
};
