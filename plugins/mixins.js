import Vue from "vue";
import { mapGetters } from "vuex";

Vue.mixin({
    methods: {
        hasError() {
            console.log("error");
        },
    },

    computed: {
        ...mapGetters({
            errors: "errors",
        }),
    },
});
