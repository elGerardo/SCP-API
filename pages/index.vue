<template>
    <div :class="['bg-white text-dark py-5']">
        <b-container :class="['my-5']">
            <b-form @submit.prevent="onSubmit" :class="['d-flex']">
                <b-form-input
                    type="text"
                    v-model="baseUrlApi"
                    :class="[$style.baseUrl, 'w-50']"
                    disabled
                />
                <b-form-select
                    v-model="select.data"
                    :options="select.options"
                    :class="[$style.select]"
                />
                <b-form-input
                    type="text"
                    v-model="params"
                    :class="[$style.text, 'w-50']"
                />
                <div
                    @click="copyToClipboard()"
                    v-b-tooltip.hover.html.top="'<h3>Copy to Clipboard<h3/>'"
                    :class="[
                        $style.container_icon,
                        'd-flex justify-content-center align-items-center px-5',
                    ]"
                >
                    <font-awesome-icon icon="fa-solid fa-clipboard" />
                </div>
                <b-button
                    type="submit"
                    :class="[$style.button, 'w-25 bg-dark text-white']"
                    ><span>Fetch</span></b-button
                >
            </b-form>

            <json-viewer
                :class="['my-5']"
                :value="custom"
                :expand-depth="5"
                copyable
                boxed
                sort
            />
        </b-container>
    </div>
</template>

<script>
import JsonViewer from "vue-json-viewer";
import { mapGetters } from "vuex";
import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { faClipboard } from "@fortawesome/free-solid-svg-icons";
library.add(faClipboard);

export default {
    components: {
        FontAwesomeIcon,
        JsonViewer,
    },

    async fetch({ store }) {
        let params = {
            endpoint: "scp",
            params: "all?limit=10",
        };
        await store.dispatch("custom/get", params);
    },

    data() {
        return {
            baseUrlApi: process.env.baseUrlApi,
            params: "all?limit=10",
            select: {
                data: "scp",
                options: [
                    {
                        value: "scp",
                        text: "scp",
                    },
                    {
                        value: "classes",
                        text: "classes",
                    },
                    {
                        value: "interviews",
                        text: "interviews",
                    },
                ],
            },
        };
    },

    computed: {
        ...mapGetters({
            custom: "custom/data",
        }),
    },

    methods: {
        async onSubmit() {
            let params = {
                params: this.params,
                endpoint: this.select.data,
            };

            await this.$store.dispatch("custom/get", params);
        },

        async copyToClipboard() {
            let endpoint = `${this.baseUrlApi}/${this.select.data}/${this.params}`;
            await navigator.clipboard.writeText(endpoint);
        },
    },
};
</script>
<style module>
@import url(../assets/welcome/welcome.module.css);
</style>
