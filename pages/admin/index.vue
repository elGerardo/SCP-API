<template>
    <div :class="['bg-white text-dark py-5']">
        <b-spinner v-if="isLoading" />
        <b-container v-if="!isLoading">
            <div>
                <h2>Register SCP</h2>
                <b-form @submit.prevent="onSubmit()">
                    <b-form-group label="SCP Number" label-for="scp_number">
                        <b-form-input
                            id="scp_number"
                            v-model="form.id"
                            placeholder="SCP Number"
                            type="number"
                            required
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group label="SCP Name" label-for="name">
                        <b-form-input
                            id="name"
                            v-model="form.name"
                            placeholder="SCP Name"
                            type="text"
                            required
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group label="Feeling" label-for="feeling">
                        <b-form-input
                            id="feeling"
                            v-model="form.feeling"
                            placeholder="Feeling"
                            type="text"
                            required
                        ></b-form-input>
                    </b-form-group>

                    <b-form-group label="Class" label-for="class_id">
                        <b-form-select
                            id="class_id"
                            v-model="form.class_id"
                            :options="catalog.classes"
                        >
                        </b-form-select>
                    </b-form-group>

                    <b-form-group label="Type" label-for="type_id">
                        <b-form-select
                            id="type_id"
                            v-model="form.type_id"
                            :options="catalog.types"
                        >
                        </b-form-select>
                    </b-form-group>

                    <b-form-group label="Picture Url" label-for="picture">
                        <b-form-input
                            id="picture"
                            v-model="form.picture"
                            placeholder="Picture Url"
                            type="text"
                            required
                        ></b-form-input>
                    </b-form-group>
                    <b-spinner v-if="isSubmitingLoading" />
                    <b-button
                        v-if="!isSubmitingLoading"
                        variant="dark"
                        type="submit"
                        style="font-size: 1.4rem"
                        >Register</b-button
                    >
                </b-form>
            </div>
            <div>
                <h2>Register SCP Features</h2>
            </div>
        </b-container>
    </div>
</template>
<script>
import { mapGetters } from "vuex";

export default {
    async fetch({ store }) {
        await store.dispatch("catalog/get");
    },

    data() {
        return {
            isLoading: true,
            isSubmitingLoading: false,
            form: {
                id: "",
                name: "",
                feeling: "",
                class_id: 0,
                type_id: 0,
                picture: "",
            },
        };
    },

    computed: {
        ...mapGetters({
            catalog: "catalog/items",
        }),
    },

    mounted() {
        this.isLoading = false;
    },

    methods: {
        async onSubmit() {
            this.isSubmitingLoading = true;
            let form = {
                id: parseInt(this.form.id),
                name: this.form.name,
                feeling: this.form.feeling,
                class_id: parseInt(this.form.class_id),
                type_id: parseInt(this.form.type_id),
                picture: this.form.picture,
            };

            await this.$store
                .dispatch("scp/registerScp", form)
                .then((response) => {
                    if (response.status == 200) {
                        this.isSubmitingLoading = false;
                        this.form = {
                            id: "",
                            name: "",
                            feeling: "",
                            class_id: 0,
                            type_id: 0,
                            picture: "",
                        };
                        return;
                    }
                });
        },
    },
};
</script>
