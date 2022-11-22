<template>
    <div :class="[$style.container]">
        <b-navbar :class="['shadow']">
            <b-container :class="['d-flex justify-content-between']">
                <div
                    :class="[
                        'd-flex justify-content-center align-items-center',
                    ]"
                >
                    <b-img src="~/static/logo.png" :class="[$style.image]" />
                    <p>SCP API</p>
                </div>
                <b-navbar-nav>
                    <NuxtLink to="/doc">API Doc</NuxtLink>
                </b-navbar-nav>
            </b-container>
        </b-navbar>
        <nuxt />
    </div>
</template>
<script>
export default {
    data() {
        return {};
    },
};
</script>
<style module>
@import url(../assets/layout/layout.module.css);
</style>
