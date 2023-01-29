<script setup>
import TablaCalzadoVue from '@/Components/TablaCalzado.vue';
import FormularioCalzadosVue from '@/Components/FormularioCalzados.vue';
import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';

defineProps({
    calzados: Object,
    rutas: Object,
    categorias: Object,
    errors: Object,

});
</script>
<template>
    <div class="bg-gray-700">
        <nav class="text-xl pt-3 pl-5 pb-3">
            <Link :href="rutas.indexCategoria" method="get" as="button"
                class="transition ease-in-out delay-150 bg-gray-700 hover:-translate-y-1 hover:scale-110 hover:bg-gray-600 duration-300 rounded-lg text-white p-2">
            Categorias</Link>
            <button class="pl-5"></button>
            <button class="pl-5"></button>
            <Link :href="rutas.index" method="get" as="button"
                class="transition ease-in-out delay-150 bg-gray-700 hover:-translate-y-1 hover:scale-110 hover:bg-gray-600 duration-300 rounded-lg text-white p-2">
            Calzado</Link>
        </nav>
    </div>
    <!--Tablas-->
    <br>
    <div class="flex justify-between gap-36 pl-24">
        <TablaCalzadoVue :calzados="calzados" :rutas="rutas" :categorias="categorias" />
        <FormularioCalzadosVue :calzados="calzados" :categorias="categorias" :errors="errors" />
    </div>
</template>