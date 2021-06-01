<template>
    <app-layout>
        <h1>Hello</h1>

        {{this.cours}}
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
        props:{
            cours: Object,
        }
    }
</script>
