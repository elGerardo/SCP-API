<template>
    <div :class="[$style.container, 'py-5']">
        <b-container :class="['my-5 position-relative']">
            <div :class="['w-25 text-dark position-fixed']">
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
            <div :class="['w-100 d-flex flex-row-reverse']">
                <div :class="['w-75']">
                    <div>
                        <h2>Information</h2>
                        <p>
                            This API was done with the intention to be a little
                            project to practice Laravel and .NET Entity
                            Framework, but currently I have the intention to
                            grow up this API in order to be the first SCP API
                            provider with the most complety information about
                            the SCP world.
                            <br />
                            This API is accesible only by HTTP methods and it's
                            not needed an authentication to consume.
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
                                <span :class="[$style.code_white]"
                                    >limit=10</span
                                >
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
                            response.<span :class="[$style.code_orange]"
                                >json</span
                            ><span :class="[$style.code_yellow]">()</span
                            ><span :class="[$style.code_blue]">)</span>
                        </b-card-text>
                    </b-card>
                    <div
                        v-for="item in list"
                        :key="item.endpoint"
                        :id="item.id"
                    >
                        <h2>
                            {{ item.endpoint }}

                            <span :class="['text-secondary']">(endpoint)</span>
                        </h2>
                        <p>{{ item.description }}</p>
                        <div>
                            <p :class="['badge badge-dark p-2']">GET</p>
                            <p style="font-size: 1.4rem">
                                {BaseURL}{{ item.url }}
                            </p>
                        </div>
                        <div>
                            <b-table-simple striped :class="['my-5']">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Description</th>
                                        <th>Params</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="action in item.actions"
                                        :key="action.name"
                                    >
                                        <td>{{ action.name }}</td>
                                        <td>{{ action.description }}</td>
                                        <b-table-simple>
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Datatype</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    v-for="param in action.params"
                                                    :key="param.name"
                                                >
                                                    <td>{{ param.name }}</td>
                                                    <td>
                                                        {{ param.datatype }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </b-table-simple>
                                    </tr>
                                </tbody>
                            </b-table-simple>
                        </div>
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
                    description: "Information about the SCP's",
                    url: "/scp/{action}/{params}",
                    actions: [
                        {
                            name: "all",
                            description:
                                "Get by default the 10 first SCP items",
                            params: [{ name: "limit", datatype: "integer" }],
                        },
                        {
                            name: "find",
                            description: "Get the SCP that you indicate",
                            params: [{ name: "scp", datatype: "integer" }],
                        },
                        {
                            name: "range",
                            description:
                                "Get the SCP's which SCP-Link are in the range",
                            params: [
                                { name: "first", datatype: "integer" },
                                { name: "last", datatype: "integer" },
                            ],
                        },
                        {
                            name: "enemies",
                            description:
                                "Get the enemies from the SCP that you indicate",
                            params: [{ name: "scp", datatype: "integer" }],
                        },
                    ],
                },
                {
                    id: "classes",
                    endpoint: "Classes",
                    description:
                        "Information about the different classes which can catalog the SCP's",
                    url: "/classes/{action}/{params}",
                    actions: [
                        { name: "all", description: "Get all classes items" },
                        {
                            name: "find",
                            description: "Get a class that is indicate",
                            params: [{ name: "name", datatype: "string" }],
                        },
                    ],
                },
                {
                    id: "interviews",
                    endpoint: "Interviews",
                    description: "Interviews done due to SCP's",
                    url: "/interviews/{action}/{params}",
                    actions: [
                        {
                            name: "all",
                            description: "Get all interviews of SCP's",
                            params: [{ name: "limit", datatype: "integer" }],
                        },
                        {
                            name: "find",
                            description:
                                "Get the interview from the SCP that you indicate",
                            params: [{ name: "scp", datatype: "integer" }],
                        },
                    ],
                },
            ],
        };
    },
};
</script>
<style module>
@import url(../../assets/doc/doc.module.css);
</style>
