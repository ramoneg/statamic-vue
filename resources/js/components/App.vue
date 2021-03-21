<template>
    <div>
        <navigation :navigation="data.navigation" />
        <block-renderer v-if="page && page.blocks" :blocks="page.blocks" :key="data.url" />
    </div>
</template>

<script>
import BlockRenderer from '@app/components/BlockRenderer'
import Navigation from '@app/components/Navigation'
import axios from 'axios'

export default {
    props: ['data'],
    components: {
        BlockRenderer,
        Navigation,
    },
    data() {
        return {
            page: null,
        }
    },

    watch: {
        async $route(to, from) {
            await this.fetchBlocks(to.path)
        },
    },

    methods: {
        async fetchBlocks(url) {
            if (url.charAt(0) == '/') {
                url = url.replace('/', '', 1)
            }
            await axios.get(`/api/routes/${url}`).then((res) => {
                this.page = res.data.data
            })
        },
    },

    async created() {
        await this.fetchBlocks(this.data.url)
    },
}
</script>