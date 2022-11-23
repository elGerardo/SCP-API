<template>
    <div :class="[$style.container, 'py-5']">
        <b-container :class="['my-5 d-flex']">
            <div :class="['w-25 text-dark']">
                <h2>Content</h2>
                <b-nav vertical>
                    <NuxtLink :class="['text-dark']" to="#information"
                        >Information</NuxtLink
                    >
                    <NuxtLink :class="['text-dark']" to="#fetching"
                        >Fetching</NuxtLink
                    >
                    <NuxtLink :class="['text-dark']" to="#scp">SCP</NuxtLink>
                    <NuxtLink :class="['text-dark']" to="#classes"
                        >Classes</NuxtLink
                    >
                    <NuxtLink :class="['text-dark']" to="#interviews"
                        >Interviews</NuxtLink
                    >
                </b-nav>
            </div>
            <div :class="['w-75']">
                <div>
                    <h2>Information</h2>
                    <p>
                        This API was done with the intention to be a little
                        project to practice Laravel and .NET Entity Framework,
                        but currently I have the intention to grow up this API
                        in order to be the first SCP API provider with the most
                        complety information about the SCP world.
                        <br />
                        This API is accesible only by HTTP methods and it's not
                        needed an authentication to consume.
                    </p>
                </div>
                <b-card
                    :class="['my-5']"
                    bg-variant="dark"
                    text-variant="white"
                    title="URL Endpoint Structure"
                >
                    <b-card-text>
                        <p :class="[$style.code_blue]">
                            BaseURL:
                            <span :class="[$style.code_white]"
                                >https://scpapi.000webhostapp.com/api/v1/</span
                            >
                        </p>
                        <p :class="[$style.code_blue]">
                            Endpoint:
                            <span :class="[$style.code_white]">SCP</span>
                        </p>
                        <p :class="[$style.code_blue]">
                            Action:
                            <span :class="[$style.code_white]">All</span>
                        </p>
                        <p :class="[$style.code_blue]">
                            Params:
                            <span :class="[$style.code_white]">limit=10</span>
                        </p>
                        <p :class="[$style.code_yellow]">
                            https://scpapi.000webhostapp.com/api/v1/scp/all?limit=10
                        </p>
                    </b-card-text>
                </b-card>
                <b-card
                    :class="['my-5']"
                    bg-variant="dark"
                    text-variant="white"
                    title="Fetching to an Endpoint"
                >
                    <b-card-text>
                        <span :class="[$style.code_red]">return</span>
                        <span :class="[$style.code_green]">fetch</span
                        ><span :class="[$style.code_blue]">(</span>
                        <span :class="[$style.code_yellow]"
                            >'https://scpapi.000webhostapp.com/api/v1/scp/all?limit=10'</span
                        >
                        <span :class="[$style.code_blue]">)</span>.<span
                            :class="[$style.code_green]"
                            >then</span
                        ><span :class="[$style.code_blue]">(</span
                        ><span :class="[$style.code_yellow]">(</span
                        ><span :class="[$style.code_orange]">response</span
                        ><span :class="[$style.code_yellow]">)</span>
                        <span :class="[$style.code_blue]">=></span>
                        response.<span :class="[$style.code_orange]">json</span
                        ><span :class="[$style.code_yellow]">()</span
                        ><span :class="[$style.code_blue]">)</span>
                    </b-card-text>
                </b-card>
                <div
                    v-for="item in list"
                    :key="item.endpoint"
                    :class="['my-5']"
                    :id="item.id"
                >
                    <h2>
                        {{ item.endpoint }}
                        <span :class="['text-secondary']">(endpoint)</span>
                    </h2>
                    <div>
                        <p>
                            <span :class="['badge badge-dark p-2']">GET</span>
                            {{ item.url }}
                        </p>
                    </div>
                </div>
            </div>
        </b-container>
    </div>
</template>
<script>
export default {
    data() {
        return {
            list: [
                {
                    id: "scp",
                    endpoint: "SCP",
                    url: "https://scpapi.000webhostapp.com/api/v1/scp/{action}/{params}",
                    actions: [
                        {
                            name: "all",
                            params: [{ name: "limit", datatype: "integer" }],
                        },
                    ],
                },
                {
                    id: "classes",
                    endpoint: "Classes",
                    url: "https://scpapi.000webhostapp.com/api/v1/classes/{action}/{params}",
                },
                {
                    id: "interviews",
                    endpoint: "Interviews",
                    url: "https://scpapi.000webhostapp.com/api/v1/interviews/{action}/{params}",
                },
            ],
        };
    },
};
</script>
<style module>
@import url(../../assets/doc/doc.module.css);
</style>
