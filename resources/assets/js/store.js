import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        users:[],
        fbEvents: [],
        uxMessage: {
            type: "alert",
            status: "success",
            message: "ala nie ma kota"
        }
    }
});