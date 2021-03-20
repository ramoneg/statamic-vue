<template>
    <div>
        <navigation :navigation="data.navigation" />
        <block-renderer :blocks="data.page.blocks" />
    </div>
</template>

<script>
import BlockRenderer from '@app/components/BlockRenderer'
import Navigation from '@app/components/Navigation'
export default ({
    props: ['data'],
    components: {
        BlockRenderer,
        Navigation
    }
})
</script>