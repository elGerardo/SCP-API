export const state = () => ({
    items: {},
});

export const getters = {
    items: (state) => state.items,
};

export const mutations = {
    items(state, data) {
        state.items = data;
    },
};

export const actions = {
    async get({ commit }) {
        let data = await fetch(
            "https://scpapi.000webhostapp.com/api/v1/classes/all"
        ).then((response) => response.json());

        commit("items", data);
    },
};
