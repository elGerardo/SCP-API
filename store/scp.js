export const state = () => ({
    scp: null,
    items: {},
});

export const getters = {
    scp: (state) => state.data,
    items: (state) => state.items,
};

export const mutations = {
    scp(state, data) {
        state.scp = data;
    },
    items(state, data) {
        state.items = data;
    },
};

export const actions = {
    async get({ commit }) {
        let url = `${this.$config.baseUrlApi}/scp/all`;

        let data = await fetch(
            "https://scpapi.000webhostapp.com/api/v1/scp/all"
        ).then((response) => response.json());

        commit("items", data.response);
    },
};
