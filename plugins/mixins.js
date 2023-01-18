import Vue from "vue";
import { mapGetters } from "vuex";

Vue.mixin({
    methods: {
        hasError(property) {
            return this.errors.hasOwnProperty(property) ? false : null;
        },
    },

    computed: {
        ...mapGetters({
            errors: "errors/errors",
        }),
    },
});
