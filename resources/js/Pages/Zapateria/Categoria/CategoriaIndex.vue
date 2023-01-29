<script setup>
import { Link } from '@inertiajs/vue3';
import BarraNavegacion from '@/Components/BarraNavegacion.vue';
import TablaCategorias from '@/Components/TablaCategorias.vue';
import FormularioCategorias from '@/Components/FormularioCategorias.vue';
import { defineProps } from 'vue';
defineProps({
  categorias: Array,
  rutas: Object,
  errors: Object,
});
</script>
<template>
  <div class="bg-gray-700">
    <nav class="text-xl pt-3 pl-5 pb-3">
      <button
        class="transition ease-in-out delay-150 bg-gray-700 hover:-translate-y-1 hover:scale-110 hover:bg-gray-600 duration-300 rounded-lg text-white p-2">
        <Link :href="rutas.index" method="get" as="button">Categorias</Link>
      </button>
      <button class="pl-5"></button>
      <button class="pl-5"></button>

      <Link :href="rutas.indexCalzado" method="get" as="button"       class="transition ease-in-out delay-150 bg-gray-700 hover:-translate-y-1 hover:scale-110 hover:bg-gray-600
      duration-300 rounded-lg text-white p-2">Calzados</Link>
      <br>
    </nav>
  </div>
  <!--Tablas-->
  <br>
  <div class="grid grid-cols-2 pl-20">
    <div class="">
      <TablaCategorias :categorias="categorias" :errors="errors" />
    </div>
    <div class="pl-20">
      <FormularioCategorias :categorias="categorias" :errors="errors" />
    </div>
  </div>
  {{ rutas }}
</template>
