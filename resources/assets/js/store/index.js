import Vue from 'vue';
import Vuex from 'vuex';
import auth from './modules/auth';

Vue.use(Vuex);

// store mutations
export const CHANGE_HEADER_HEIGHT = 'CHANGE_HEADER_HEIGHT';

export default new Vuex.Store({
  state: {
    headerHeight: 10,
  },
  mutations: {
    [CHANGE_HEADER_HEIGHT](state, newHeight) {
      state.headerHeight = newHeight;
    },
  },
  modules: {
    auth,
  },
});
