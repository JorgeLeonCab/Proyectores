<template>
    <div
        class="z-10 fixed top-0 h-full w-full text-center"
        style="background-color:rgba(50,50,50,0.5)"
    >
        <div class="mx-auto text-center">
            <div class="p-5 rounded-md mt-5 mx-auto w-3/4 bg-sky-100 shadow-lg">
                <span @click="emitCierraComponenteBoton()" class="mx-auto mt-40 inline-block cursor-pointer bg-red-500 border-2 border-red-600">
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
        methods: {
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