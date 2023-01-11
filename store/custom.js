export const state = () => ({
    data: {},
});

export const getters = {
    data: (state) => state.data,
};

export const mutations = {
    data(state, data) {
        state.data = data;
    },
};

export const actions = {
    async get({ commit }, params) {
        let url = `${process.env.baseUrlApi}/${params.endpoint}/${params.params}`;

        let data = await fetch(`${url}`).then((response) => response.json());

        commit("data", data);
    },
};
