<template>
    <div
        class="z-10 fixed top-0 h-full w-full text-center overflow-auto"
        style="background-color:rgba(50,50,50,0.5)"
    >
        <div class="mx-auto text-center overflow-auto">
            <div class="p-5 rounded-md mt-5 mx-auto w-3/5 bg-sky-100 shadow-lg">
                <div class="m-7 uppercase font-semibold">
                    Seleecione el horario de su reserva
                </div>
                <div>
                    <section class="inline-block">
                        <p>
                            <label for="" class="text-sm italic ml-4">
                                Model:
                                <input class="my-2 mx-2 h-6 shadow-lg bg-white rounded-lg" type="text" v-model="name">
                            </label>
                        </p>
                        <p>
                            <label for="" class="text-sm italic ml-4">
                                Numero de serie:
                                <input class="my-2 mx-2 h-6 shadow-lg bg-white rounded-lg" type="text" v-model="numero_serie">
                            </label>
                        </p>
                    </section>
                </div>
                <span 
                    @click="guardarFormulario()" 
                    class="px-1 py-2 mr-10 mt-10 inline-block cursor-pointer rounded-md bg-white border-2 border-black hover:bg-stone-200"
                >
                    Guardar
                </span>
                <span 
                    @click="emitCierraComponenteBoton()" 
                    class="px-3 py-2 ml-10 mt-10 inline-block cursor-pointer rounded-md bg-white border-2 border-black hover:bg-stone-200"
                >
                    Cerrar
                </span>
            </div>
        </div>
    </div>
</template>
<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import {Head, Link} from '@inertiajs/inertia-vue3'
    import axios from 'axios'

    export default {
        props:{
            id_elemento : Number,
        },
        data(){
            return{
                name:'',
                numero_serie:'',
                msg: {
                    estado:true,
                    msg:'',
                    boton:'',
                }
            }
        },
        components:{
            AppLayout,
            Head,
            Link,
        },
        mounted(){
        },
        methods: {
            async guardarFormulario(){
                const data = {
                    name:this.name,
                    numero_serie:this.numero_serie,
                };
                const response = await axios.post('proyectores',data);
                console.log(response);
                this.emitCierraComponente()
            },
            emitCierraComponenteBoton(){
                this.msg = {
                    estado: true,
                    boton:'error',
                    msg:'Operacion cancelada',
                }
                this.emitCierraComponente();
            },
            emitCierraComponente(){
                this.$emit('cierraModal',this.msg)
            }
        }
    }
</script>