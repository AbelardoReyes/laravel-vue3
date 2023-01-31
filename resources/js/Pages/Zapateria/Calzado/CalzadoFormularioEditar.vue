<script setup>
import { Link } from '@inertiajs/vue3';
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'
import { defineProps } from 'vue';
const props = defineProps({
    calzado: Array,
    categorias: Object,
    errors: Object,
});

const form = reactive({
    id: props.calzado.id,
    marca: props.calzado.marca,
    color: props.calzado.color,
    modelo: props.calzado.modelo,
    precio: props.calzado.precio,
    existencia: null,
    categoria: null,
})

function submit() {
    router.put(props.calzado.edit, form)
}
</script>
<template>

    <div class="container">
        <div class="grid grid-cols-2  pt-10 pr-80">
            <div></div>
            <div
                class="items-center w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-2xl sm:p-6 md:p-8 dark:bg-gray-100 dark:border-gray-700">
                <form @submit.prevent="submit">
                    <h1 class="text-center">Editar Calzado</h1>
                    <!--Error marca-->
                    <div v-if="errors.marca" class="p-1 text-sm text-red-800 rounded-lg bg-red-200  dark:text-red-700"
                        role="alert">
                        {{ errors.marca }}
                    </div>
                    <input id="marca" v-model="form.marca"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder="Marca del calzado" />
                    <!--Error color-->
                    <div v-if="errors.color" class="p-1 text-sm text-red-800 rounded-lg bg-red-200  dark:text-red-700"
                        role="alert">
                        {{ errors.color }}
                    </div>
                    <input id="color" v-model="form.color"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder="Color del calzado" />
                    <!--Error modelo-->
                    <div v-if="errors.modelo" class="p-1 text-sm text-red-800 rounded-lg bg-red-200  dark:text-red-700"
                        role="alert">
                        {{ errors.modelo }}
                    </div>
                    <input id="modelo" v-model="form.modelo" type="number"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder="Modelo del calzado" />
                    <!--Error precio-->
                    <div v-if="errors.precio" class="p-1 text-sm text-red-800 rounded-lg bg-red-200  dark:text-red-700"
                        role="alert">
                        {{ errors.precio }}
                    </div>
                    <input id="precio" v-model="form.precio" type="number"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder="Precio del calzado" />
                    <!--Error existencia-->
                    <div v-if="errors.existencia"
                        class="p-1 text-sm text-red-800 rounded-lg bg-red-200  dark:text-red-700" role="alert">
                        {{ errors.existencia }}
                    </div>
                    <input id="existencia" v-model="form.existencia" type="number"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Ingrese la canitdad a sumar" />
                    <!--Error modelo-->
                    <div v-if="errors.categoria"
                        class="p-1 text-sm text-red-800 rounded-lg bg-red-200  dark:text-red-700" role="alert">
                        {{ errors.categoria }}
                    </div>
                    <select id="categoria" v-model="form.categoria"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option v-for="categoria in categorias" :key="categoria.id" :value="categoria.id">{{
                            categoria.nombre
                        }}</option>
                    </select>
                    <br>
                    <button type="submit"
                        class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition ease-in-out duration-300 hover:-translate-y-1 hover:scale-110">Guardar</button>
                    <button class="pl-10"></button>
                    <Link :href="calzado.index"
                        class="bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded transition ease-in-out duration-300 hover:-translate-y-1 hover:scale-110">
                    Regresar</Link>
                    <button class="pr-10"></button>
                </form>
            </div>
        </div>
    </div>
</template>