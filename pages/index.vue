<template>
    <div :class="[$style.container, 'py-5']">
        <b-container :class="['my-5']">
            <b-form @submit.prevent="onSubmit" :class="['d-flex']">
                <b-form-input
                    type="text"
                    v-model="this.$config.baseUrlApi"
                    :class="[$style.baseUrl, 'w-25']"
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
import { mapGetters } from "vuex";
import JsonViewer from "vue-json-viewer";
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
            baseUrlApi: this.$config.baseUrlApi,
            params: "scp?limit=10",
            select: {
                data: "scp",
                options: [
                    {
                        value: "scp",
                        text: "scp",
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

            console.log(this.custom);
        },
    },
};
</script>
<style module>
@import url(../assets/welcome/welcome.module.css);
</style>
