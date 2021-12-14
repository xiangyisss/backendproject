<template>
    <div>
         <Link href="/">Home</Link>
        <h1>about page</h1>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'
export default defineComponent({
    components: {
        Link
    }
})
</script>

<style scoped>

</style>