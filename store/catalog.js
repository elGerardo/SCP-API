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
        let data = await fetch(`${process.env.baseUrlAdminApi}/catalog/all`, {
            headers: {
                pwd: process.env.AdminPwd,
            },
        }).then((response) => response.json());

        commit("items", data.response);
    },
};
