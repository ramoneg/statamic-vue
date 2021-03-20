<template>
    <div class="w-100 bg-gradient-to-r from-blue-200 to-blue-300 flex justify-center items-center" style="height: 50vh; min-height: 30rem">
        <div class="container">
            <div class="text-white">
                <h1 class="text-shadow text-5xl font-bold">{{ block.title }}</h1>
                <p class="text-shadow text-2xl">{{ block.description }}</p>
            </div>
                
            <div v-if="block.buttons" class="mt-4">
                <a v-for="(button, index) in block.buttons" :key="index" :href="button.url" class="px-4 py-2 rounded shadow bg-red-400">
                    {{ button.label }}
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default ({
    props: ['block']
})
</script>