

<script setup>
import { Link } from '@inertiajs/vue3';
import CategoriaIndex from '@/Pages/Zapateria/Categoria/CategoriaIndex.vue';

import { defineProps } from 'vue';

defineProps({
  categorias: Array,
  rutas: Object,
  errors: Object,
});

</script>
<script>
import BarraNavegacion from '@/Components/BarraNavegacion.vue';
import TablaCategorias from '@/Components/TablaCategorias.vue';
import FormularioCategorias from '@/Components/FormularioCategorias.vue';

export default {
  // Using shorthand syntax...
  layout: BarraNavegacion,TablaCategorias,FormularioCategorias
};
console.log("Categoria Index");
</script>

<template>
<!--Barra de navegacion-->

  <!--Tablas-->
  <br>
  <div class="flex justify-between gap-44 pl-20">
    <TablaCategorias :categorias="categorias" :errors="errors" />
    <FormularioCategorias :categorias="categorias" :errors="errors" />
  </div>
</template>
