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
        let data = await fetch(`${process.env.baseUrlApi}/scp/all`).then(
            (response) => response.json()
        );

        commit("items", data.response);
    },

    async registerScp(context, form) {
        console.log(form);
        return await fetch(`${process.env.baseUrlAdminApi}/register_scp`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                pwd: process.env.AdminPwd,
            },
            body: JSON.stringify(form),
        }).then((response) => response.json());
    },
};
