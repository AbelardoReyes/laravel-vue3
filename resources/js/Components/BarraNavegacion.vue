<script>

import { Link } from '@inertiajs/vue3';
import { defineComponent } from 'vue';
import { defineProps } from 'vue';
defineProps({
    categorias: Object,
    rutas: Array,
    errors: Object,
});
export default defineComponent({
    components: { Link },
});
</script>
<template>

</template>
