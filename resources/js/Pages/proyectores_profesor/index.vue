<template>
    <app-layout>
        <Apartado
            v-if="mostrar_componente_apartar"
            :id_elemento="id_elemento"
            @cierraModal="cerrandoModal"
        />
        <div class="mx-auto text-center">
            <div class="p-5 rounded-md mt-5 mx-auto w-3/4 bg-sky-100 shadow-lg">
                <div v-if="proyectores.length != 0">
                    <h1 class="mb-2 pb-4 font-bold">Proyectores</h1>
                    <section class="w-4/5 mx-auto grid grid-cols-3">
                        <article class="px-14 pb-3 uppercase bg-black text-white font-semibold border-2 border-white">
                            <p>
                                Numero de serie
                            </p>
                        </article>
                        <article class="px-14 pb-3 uppercase bg-black text-white font-semibold border-2 border-white">
                            <p>
                                Modelo
                            </p>
                        </article>
                        <article class="px-14 pb-3 uppercase bg-black text-white font-semibold border-2 border-white">
                            <p>
                                Opciones
                            </p>
                        </article>
                    </section>
                    <section class="w-4/5 mx-auto grid grid-cols-3" v-for="(proyector, indice) in proyectores" :key="indice">
                        <article class="px-14 py-3 border-2 border-white" :class = "(indice%2 == 0)?'bg-stone-300' :'bg-stone-100'">
                            <p>
                                {{ proyector.numero_serie }}
                            </p>
                        </article>
                        <article class="px-14 py-3 border-2 border-white" :class = "(indice%2 == 0)?'bg-stone-300' :'bg-stone-100'">
                            <p>
                                {{ proyector.name }}
                            </p>
                        </article>
                        <article class="px-14 py-3 border-2 border-white" :class = "(indice%2 == 0)?'bg-stone-300' :'bg-stone-100'">
                            <span 
                                @click="componenteApartar(proyector.id)"
                                class="px-6 py-2 rounded-md bg-stone-900 text-white font-semibold border-2 border-white cursor-pointer hover:bg-stone-700"
                            >
                                Apartar este proyector
                            </span>
                        </article>
                    </section>
                </div>
                <div v-else>
                    <p class="uppercase font-bold py-5">
                        no hay proyectores disponibles
                    </p>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import {Head, Link} from '@inertiajs/inertia-vue3'
import axios from 'axios'
import Apartado from './apartado.vue'

export default {
    data(){
        return {
            proyectores: [],
            mostrar_componente_apartar: false,
            id_elemento: 0,
        }
    },
    components:{
        AppLayout,
        Head,
        Link,
        Apartado
    },
    mounted(){
        this.getProyectores();
    },
    methods:{
        async getProyectores(){
            const api = `get-proyectores`;
            const data = await axios.get(api);
            this.proyectores = data.data;
            console.log(this.proyectores.length);
        },
        componenteApartar(id){
            this.mostrar_componente_apartar = true;
            this.id_elemento = id;
        },
        cerrandoModal(e){
            this.mostrar_componente_apartar = false;
            this.getProyectores
        },
    }
}
</script>