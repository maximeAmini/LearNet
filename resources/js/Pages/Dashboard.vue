<template>
    <app-layout>
        <h1>Hello</h1>
        {{this.watched}}
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
        prop:{
            cours: Object,
            watched: Object
        }
    }
</script>
