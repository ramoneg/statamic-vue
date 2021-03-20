<template>
  <nav class="w-100 bg-gray-100 py-4 flex justify-center items-center shadow sticky top-0">
      <div class="container flex justify-between">
          <h2>
              <a href="/">Statamic Vue 3</a>
          </h2>
          <div>
              <a v-for="(link, index) in navigation" :key="index" class="pl-2" :href="link.url">{{ link.title }}</a>
          </div>
      </div>
  </nav>
</template>

<script>
export default ({
    props: ['navigation']
})
</script>