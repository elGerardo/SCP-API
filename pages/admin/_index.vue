<template>
    <div :class="['bg-white text-dark py-5']">
        <b-spinner v-if="isLoading" />
        <!--
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
                <a href="#features" :class="['text-white mx-4']"
                    >Scp Features</a
                >
                <a href="#scp_skills" :class="['text-white ms-4']"
                    >Scp Skills</a
                >
                <a href="#features" :class="['text-white mx-4']">Scp Enemies</a>
            </div>
        </div>-->
        <b-container v-if="!isLoading">
            <b-button
                v-b-toggle.scp_collapse
                variant="dark"
                style="font-size: 1.4rem"
                >SCP</b-button
            >
            <b-collapse id="scp_collapse">
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
                        </b-form-group>
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
                                :state="hasError('scp_id')"
                            >
                            </b-form-select>
                            <b-form-invalid-feedback>
                                <p v-if="errors.scp_id">
                                    <span
                                        v-for="error in errors.scp_id"
                                        :key="error.scp_id"
                                    >
                                        {{ error }}
                                    </span>
                                </p>
                            </b-form-invalid-feedback>
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
                                :state="hasError('short_description')"
                            ></b-form-input>
                            <b-form-invalid-feedback>
                                <p v-if="errors.short_description">
                                    <span
                                        v-for="error in errors.short_description"
                                        :key="error.short_description"
                                    >
                                        {{ error }}
                                    </span>
                                </p>
                            </b-form-invalid-feedback>
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
                                :state="hasError('full_description')"
                            ></b-form-input>
                            <b-form-invalid-feedback>
                                <p v-if="errors.full_description">
                                    <span
                                        v-for="error in errors.full_description"
                                        :key="error.full_description"
                                    >
                                        {{ error }}
                                    </span>
                                </p>
                            </b-form-invalid-feedback>
                        </b-form-group>
                        <b-form-group label="Color" label-for="color">
                            <b-form-input
                                id="color"
                                v-model="features_form.color"
                                placeholder="Write the color..."
                                type="text"
                                :state="hasError('color')"
                            ></b-form-input>
                            <b-form-invalid-feedback>
                                <p v-if="errors.color">
                                    <span
                                        v-for="error in errors.color"
                                        :key="error.color"
                                    >
                                        {{ error }}
                                    </span>
                                </p>
                            </b-form-invalid-feedback>
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
            </b-collapse>

            <b-button
                v-b-toggle.skill_collapse
                variant="dark"
                style="font-size: 1.4rem"
                >Skills</b-button
            >
            <b-collapse id="skill_collapse">
                <div :class="['mb-5']" id="skill">
                    <h2>Register Skill</h2>
                    <b-form @submit.prevent="onSubmit({ type: 'skill' })">
                        <b-form-group label="Skill Name" label-for="skill_name">
                            <b-form-input
                                id="skill_name"
                                v-model="skill_form.name"
                                placeholder="Write a Skill Name..."
                                type="text"
                                :state="hasError('skill_name')"
                            />
                        </b-form-group>
                        <b-form-group
                            label="Skill Description"
                            label-for="skill_description"
                        >
                            <b-form-input
                                id="skill_description"
                                v-model="skill_form.description"
                                placeholder="Write a Skill Description..."
                                type="text"
                                :state="hasError('skill_description')"
                            />
                        </b-form-group>
                        <b-spinner v-if="isSubmitingLoading" />
                        <b-button
                            v-if="!isSubmitingLoading"
                            variant="dark"
                            type="submit"
                            style="font-size: 1.4rem"
                            >Register Skill</b-button
                        >
                    </b-form>
                </div>
            </b-collapse>

            <b-button
                v-b-toggle.types_collapse
                variant="dark"
                style="font-size: 1.4rem"
                >Types</b-button
            >
            <b-collapse id="types_collapse">

                <div :class="['mb-5']" id="types">
                    <h2>Register Types</h2>
                    <b-form @submit.prevent="onSubmit({ type: 'types' })">
                        <b-form-group label="Type Name" label-for="type_name">
                            <b-form-input
                                id="type_name"
                                v-model="type_form.name"
                                placeholder="Write a Type Name..."
                                type="text"
                                :state="hasError('type_name')"
                            />
                        </b-form-group>
                        <b-form-group
                            label="Type Description"
                            label-for="type_description"
                        >
                            <b-form-input
                                id="type_description"
                                v-model="type_form.description"
                                placeholder="Write a Type Description..."
                                type="text"
                                :state="hasError('type_description')"
                            />
                        </b-form-group>
                        <b-spinner v-if="isSubmitingLoading" />
                        <b-button
                            v-if="!isSubmitingLoading"
                            variant="dark"
                            type="submit"
                            style="font-size: 1.4rem"
                            >Register Type</b-button
                        >
                    </b-form>
                </div>

            </b-collapse>
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
            skill_form: {
                name: "",
                description: "",
            },
            type_form: {
                name: "",
                description: "",
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
                    const response = await this.$store.dispatch(
                        "scp/registerScp",
                        form
                    );
                    if (response.status == 200) {
                        this.form = {
                            id: "",
                            name: "",
                            feeling: "",
                            class_id: 0,
                            type_id: 0,
                            picture: "",
                        };
                    }
                } catch (e) {
                    if (process.env.environment == "local") console.log(e);
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

                try {
                    const response = await this.$store.dispatch(
                        "features/registerFeatures",
                        form
                    );

                    if (response.status == 200) {
                        await this.$store.dispatch("catalog/get");
                        this.features_form = {
                            scp_id: "",
                            short_descripton: "",
                            full_descripton: "",
                            color: "",
                        };
                    }
                } catch (e) {
                    if (process.env.environment == "local") console.log(e);
                }
                this.isSubmitingLoading = false;
                return;
            }

            if (type == "skill") {
                try {
                    const response = await this.$store.dispatch(
                        "skills/registerSkill",
                        this.skill_form
                    );

                    if (response.status == 200) {
                        await this.$store.dispatch("catalog/get");
                        this.skill_form = {
                            name: "",
                            descripton: "",
                        };
                    }
                } catch (e) {
                    if (process.env.environment == "local") console.log(e);
                }
                this.isSubmitingLoading = false;
                return;
            }

            if(type == "types") {

            }
        },
    },
};
</script>
<style module>
@import url(../../assets/admin/admin.module.css);
</style>
