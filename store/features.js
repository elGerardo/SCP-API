const config = {
    headers: {
        "Content-Type": "application/json",
        pwd: process.env.AdminPwd,
    },
};

export const actions = {
    async registerFeatures(context, form) {
        return await this.$axios.post(
            `${process.env.baseUrlAdminApi}/register_features`,
            form,
            config
        );
    },
};
