<template>
    <div>
        <div>
            <Link to="/about"/>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
    name: 'Navbar',
    components: {
        Link
    }
})
</script>

<style scoped>

</style>