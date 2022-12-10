<template>
    <app-layout>
        <div class="mx-auto bg-red-600 text-center">
            <div class="mt-5 mx-auto w-3/4 bg-slate-300">
                Hola mundo
            </div>
        </div>
    </app-layout>
</template>
<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import {Head, Link} from '@inertiajs/inertia-vue3'
import axios from 'axios'

export default {
    data(){
        return {
        }
    },
    components:{
        AppLayout,
        Head,
        Link
    },
    mounted(){},
    methods:{}
}
</script>