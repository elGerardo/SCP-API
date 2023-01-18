<template>
    <div :class="['bg-white text-dark py-5']">
        <b-spinner v-if="isLoading" />
        <div
            :class="[
                $style.navbar,
                'position-fixed w-100 text-white d-flex justify-content-center',
            ]"
        >
            <div
                :class="[
                    'w-50 d-flex justify-content-center align-items-center',
                ]"
            >
                <a href="#scp" :class="['text-white me-4']">Scp</a>
                <a href="#features" :class="['text-white mx-4']">Features</a>
                <a href="#scp_skills" :class="['text-white ms-4']"
                    >Scp Skills</a
                >
            </div>
        </div>
        <b-container v-if="!isLoading">
            <div :class="['mb-5']" id="scp">
                <h2>Register SCP</h2>
                <b-form @submit.prevent="onSubmit({ type: 'scp' })">
                    <b-form-group label="SCP Number" label-for="scp_number">
                        <b-form-input
                            id="scp_number"
                            v-model="scp_form.id"
                            placeholder="Write the SCP number..."
                            type="number"
                            :state="hasError('id')"
                        ></b-form-input>
                        <b-form-invalid-feedback>
                            <p v-if="errors.id">
                                <span
                                    v-for="error in errors.id"
                                    :key="error.id"
                                >
                                    {{ error }}
                                </span>
                            </p>
                        </b-form-invalid-feedback>
                    </b-form-group>
                    <b-form-group label="SCP Name" label-for="name">
                        <b-form-input
                            id="name"
                            v-model="scp_form.name"
                            placeholder="Write the SCP name"
                            type="text"
                            :state="hasError('name')"
                        ></b-form-input>
                        <b-form-invalid-feedback>
                            <p v-if="errors.name">
                                <span
                                    v-for="error in errors.name"
                                    :key="error.name"
                                >
                                    {{ error }}
                                </span>
                            </p>
                        </b-form-invalid-feedback>
                    </b-form-group>
                    <b-form-group label="Feeling" label-for="feeling">
                        <b-form-input
                            id="feeling"
                            v-model="scp_form.feeling"
                            placeholder="Write the feeling..."
                            type="text"
                            :state="hasError('feeling')"
                        ></b-form-input>
                        <b-form-invalid-feedback>
                            <p v-if="errors.feeling">
                                <span
                                    v-for="error in errors.feeling"
                                    :key="error.feeling"
                                >
                                    {{ error }}
                                </span>
                            </p>
                        </b-form-invalid-feedback>
                    </b-form-group>
                    <b-form-group label="Class" label-for="class_id">
                        <b-form-select
                            id="class_id"
                            v-model="scp_form.class_id"
                            :options="catalog.classes"
                            :state="hasError('class_id')"
                        >
                        </b-form-select>
                        <b-form-invalid-feedback>
                            <p v-if="errors.class_id">
                                <span
                                    v-for="error in errors.class_id"
                                    :key="error.class_id"
                                >
                                    {{ error }}
                                </span>
                            </p>
                        </b-form-invalid-feedback>
                    </b-form-group>
                    <b-form-group label="Type" label-for="type_id">
                        <b-form-select
                            id="type_id"
                            v-model="scp_form.type_id"
                            :options="catalog.types"
                            :state="hasError('type_id')"
                        >
                        </b-form-select>
                        <b-form-invalid-feedback>
                            <p v-if="errors.type_id">
                                <span
                                    v-for="error in errors.type_id"
                                    :key="error.type_id"
                                >
                                    {{ error }}
                                </span>
                            </p>
                        </b-form-invalid-feedback>
                    </b-form-group>
                    <b-form-group label="Picture Url" label-for="picture">
                        <b-form-input
                            id="picture"
                            v-model="scp_form.picture"
                            placeholder="Write the picture url..."
                            type="text"
                            :state="hasError('picture')"
                        ></b-form-input>
                    </b-form-group>
                    <b-form-invalid-feedback>
                        <p v-if="errors.picture">
                            <span
                                v-for="error in errors.picture"
                                :key="error.picture"
                            >
                                {{ error }}
                            </span>
                        </p>
                    </b-form-invalid-feedback>
                    <b-spinner v-if="isSubmitingLoading" />
                    <b-button
                        v-if="!isSubmitingLoading"
                        variant="dark"
                        type="submit"
                        style="font-size: 1.4rem"
                        >Register SCP</b-button
                    >
                </b-form>
            </div>
            <div :class="['mb-5']" id="features">
                <h2>Register SCP Features</h2>
                <b-form @submit.prevent="onSubmit({ type: 'features' })">
                    <b-form-group
                        label="SCP Number"
                        label-for="features_scp_id"
                    >
                        <b-form-select
                            id="features_scp_id"
                            v-model="features_form.scp_id"
                            :options="catalog.scps"
                        >
                        </b-form-select>
                    </b-form-group>
                    <b-form-group
                        label="Short Description"
                        label-for="short_description"
                    >
                        <b-form-input
                            id="short_description"
                            v-model="features_form.short_descripton"
                            placeholder="Write a short description..."
                            type="text"
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group
                        label="Full Description"
                        label-for="full_description"
                    >
                        <b-form-input
                            id="full_description"
                            v-model="features_form.full_descripton"
                            placeholder="Write a full description..."
                            type="text"
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group label="Color" label-for="color">
                        <b-form-input
                            id="color"
                            v-model="features_form.color"
                            placeholder="Write the color..."
                            type="text"
                        ></b-form-input>
                    </b-form-group>
                    <b-spinner v-if="isSubmitingLoading" />
                    <b-button
                        v-if="!isSubmitingLoading"
                        variant="dark"
                        type="submit"
                        style="font-size: 1.4rem"
                        >Register Features</b-button
                    >
                </b-form>
            </div>
        </b-container>
    </div>
</template>
<script>
import { mapGetters } from "vuex";

export default {
    async fetch({ store, route, redirect }) {
        if (route.params.index == process.env.AdminPwd) {
            await store.dispatch("catalog/get");
            return;
        }

        redirect("/");
        return;
    },

    data() {
        return {
            isLoading: true,
            isSubmitingLoading: false,
            scp_form: {
                id: "",
                name: "",
                feeling: "",
                class_id: 0,
                type_id: 0,
                picture: "",
            },
            features_form: {
                scp_id: "",
                short_descripton: "",
                full_descripton: "",
                color: "",
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
        async onSubmit({ type }) {
            this.isSubmitingLoading = true;
            let form;
            if (type == "scp") {
                form = {
                    id: parseInt(this.scp_form.id),
                    name: this.scp_form.name,
                    feeling: this.scp_form.feeling,
                    class_id: parseInt(this.scp_form.class_id),
                    type_id: parseInt(this.scp_form.type_id),
                    picture: this.scp_form.picture,
                };
                try {
                    await this.$store
                        .dispatch("scp/registerScp", form)
                        .then((response) => {
                            if (response.status == 200) {
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
                } catch (e) {
                    //console.log(e);
                }
                this.isSubmitingLoading = false;
                return;
            }

            if (type == "features") {
                form = {
                    scp_id: parseInt(this.features_form.scp_id),
                    short_descripton: this.features_form.short_descripton,
                    full_descripton: this.features_form.full_descripton,
                    color: this.features_form.color,
                };
                console.log("forming on admin page");

                await this.$store
                    .dispatch("features/registerFeatures", form)
                    .then(async (response) => {
                        if (response.status == 200) {
                            await this.$store.dispatch("catalog/get");
                            this.features_form = {
                                scp_id: "",
                                short_descripton: "",
                                full_descripton: "",
                                color: "",
                            };
                            this.isSubmitingLoading = false;
                            return;
                        }
                    });

                return;
            }
        },
    },
};
</script>
<style module>
@import url(../../assets/admin/admin.module.css);
</style>
