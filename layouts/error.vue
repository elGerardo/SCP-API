<template>
    <div :class="['bg-white text-dark py-5']">
        <b-container>
            <h1>Page not found</h1>
            <nuxt-link to="/" :class="['btn btn-dark']" style="font-size:1.4rem">Go Home</nuxt-link>
        </b-container>
    </div>
</template>

<script>
export default {
    props: ["error"],
    layout: "error",
};
</script>
