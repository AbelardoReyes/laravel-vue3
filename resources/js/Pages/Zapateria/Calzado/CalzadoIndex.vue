<script setup>

import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';

defineProps({
    calzados: Object,
    rutas: Object,
    categorias: Object,
    errors: Object,

});
</script>

<script>
import BarraNavegacion from '@/Components/BarraNavegacion.vue';
import TablaCalzado from '@/Components/TablaCalzado.vue';
import FormularioCalzados from '@/Components/FormularioCalzados.vue';

export default {
  // Using shorthand syntax...
  layout: BarraNavegacion,TablaCalzado,FormularioCalzados
};
console.log("Calzado Index");
</script>
<template>

    <!--Tablas-->
    <br>
    <div class="flex justify-between gap-36 pl-24">
        <TablaCalzado :calzados="calzados" :rutas="rutas" :categorias="categorias" />
        <FormularioCalzados :calzados="calzados" :categorias="categorias" :errors="errors" />
    </div>
</template>