import Vuex from 'vuex'
import Vue from 'vue'
import core from './core'
import createPersistedState from 'vuex-persistedstate'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        core,
    },
    plugins: [createPersistedState({ storage: window.sessionStorage })]
})
