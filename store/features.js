export const actions = {
    async registerFeatures({ commit }, form) {
        return await fetch(`${process.env.baseUrlAdminApi}/register_features`, {
            method: "POST",
            headers: {
                pwd: process.env.AdminPwd,
            },
            body: JSON.stringify(form)
        }).then((response) => response.json());
    },
};
