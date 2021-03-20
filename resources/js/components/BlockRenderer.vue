<template>
  <div v-for="(block, index) in blocks" :key="`block.type-${index}`" >
    <component v-if="componentExists(block.type)" :is="block.type" :block="block" />
  </div>
</template>

<script>
import { defineAsyncComponent } from 'vue'

export default {
    name: 'BlockRenderer',
    props: {
      blocks: {
        type: Object,
        required: true
      }
    },
    components: {
        hero: defineAsyncComponent(() => import('@app/components/blocks/Hero.vue')),
        'text-section': defineAsyncComponent(() => import('@app/components/blocks/TextSection.vue')),
    },

    methods: {
      componentExists(component) {
        if (!this.$options.components[component]) {
          console.log(`⛑ ${component} missing`)
        }

        return true
      }
    }
}
</script>