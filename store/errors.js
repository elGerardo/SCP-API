export const state = () => ({
    errors: [],
});

export const getters = {
    errors: (state) => state.errors,
};

export const mutations = {
    errors(state, data) {
        state.errors = data;
    },
};

export const actions = {
    errors({ commit }, errors) {
        commit("items", errors);
    },
};
