<script setup>
import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';
defineProps({
    categorias: Object,
    errors: Object,
});

</script>
<template>
    <div class="container grid grid-cols-1 pl-5">
        <!--Div para crear la tabla-->
        <div class="">
            <table class="table-auto text-center  border-separate border border-slate-500">
                <thead class="bg-indigo-00">
                    <tr class="">
                        <th class="pl-5 pr-5  border border-slate-600">ID</th>
                        <th class="pl-5 pr-5 border border-slate-600 ">Categoria</th>
                        <th class="pl-10 pr-10 border border-slate-600">Descripcion</th>
                        <th class="pl-5 pr-5 border border-slate-600">Nuevo Calzado</th>
                        <th class="pl-5 pr-5 border border-slate-600">Editar</th>
                        <th class="pl-5 pr-5 border border-slate-600">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="categoria in categorias" :key="categoria.nombre">
                        <td>{{ categoria.id }}</td>
                        <td>{{ categoria.nombre }}</td>
                        <td>{{ categoria.descripcion }}</td>
                        <td><Link :href="categoria.viewCalzado" method="get" as="button">Nuevo</Link></td>
                        <td>
                            <Link :href="categoria.viewEdit" method="get" as="button">Editar
                            </Link>
                        </td>
                        <td>
                            <Link :href="categoria.viewDelete" method="get" as="button">Eliminar
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
</template>