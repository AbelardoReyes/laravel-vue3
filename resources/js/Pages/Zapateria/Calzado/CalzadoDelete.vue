<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';
defineProps({
    calzado: Object,
    errors: Object,
});
</script>
<template>
    {{ calzado  }}
    <div class="container grid grid-cols-3 pt-10 pl-20">
        <div></div>
        <div class="shadow-2xl text-center p-10 border redonded">
            <h1 class="text-3xl">¿Esta seguro de eliminar el zapato {{calzado.marca}}?, Una vez hecho esta
                accion no se puede deshacer!</h1>
            <br>
            <Link :href="calzado.index" method="get" as="button"
                class="bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded transition ease-in-out duration-300 hover:-translate-y-1 hover:scale-110 ">
            Regresar</Link>
            <Link class="p-10">
            </Link>
            <Link :href="calzado.delete" :data="calzado" method="delete" as="button"
                class="bg-amber-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition ease-in-out duration-300 hover:-translate-y-1 hover:scale-110">
            Eliminar</Link>
        </div>
    </div>
</template>