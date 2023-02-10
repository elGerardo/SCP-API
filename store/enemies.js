export const state = () => ({
    items: [],
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

const config = {
    headers: {
        "Content-Type": "application/json",
        pwd: process.env.AdminPwd,
    },
};

export const actions = {
    async registerEnemies(context, form) {
        return await this.$axios.post(
            `${process.env.baseUrlAdminApi}/register_scp_enemies`,
            form,
            config
        );
    },
};
