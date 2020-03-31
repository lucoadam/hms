const state = {
    metas: {},
    auth: {
        user: {}
    },
    symbolNumber: null
}

const actions = {
    // The first argument is the vuex store, but we're using only the
    // dispatch function, which applies a mutation to the store,
    // and the current state of the store
}

const mutations = {
    clearAllMetasData: function (state) {
        state.metas = {}
    },

    updateNextEntrySymbolNumber (state, symbolNumber) {
        state.symbolNumber = (parseInt(symbolNumber) + 1).toString().padStart(symbolNumber.length, '0')
    },

    updateMetaByKey: function (state, meta) {
        state.metas[meta.key] = meta.value
    },

    mapAndStoreAllMetas: function (state, metas) {
        let mappedMetas = {}
        metas.forEach((item) => {
            mappedMetas[item.key] = item.value
        })
        state.metas = mappedMetas
    },

    setUser: function (state, user) {
        state.auth.user = user
    }
}

const getters = {}

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
}
