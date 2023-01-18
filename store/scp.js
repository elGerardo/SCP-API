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
        let data = await this.$axios.get(`${process.env.baseUrlApi}/scp/all`);

        commit("items", data.data.response);
    },

    async registerScp(context, form) {
        console.log(form);
        const config = {
            headers: {
                "Content-Type": "application/json",
                pwd: process.env.AdminPwd,
            },
        };
        return await this.$axios.post(
            `${process.env.baseUrlAdminApi}/register_scp`,
            form,
            config
        );
    },
};
