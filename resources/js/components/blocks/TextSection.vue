<template>
    <div class="w-100 flex justify-center items-center mt-16">
        <div class="container">
            <h2 class="text-4xl font-bold">{{ block.title }}</h2>
            <p class="mt-2">{{ block.content }}</p>
        </div>
    </div>
</template>

<script>
export default ({
    props: ['block']
})
</script>