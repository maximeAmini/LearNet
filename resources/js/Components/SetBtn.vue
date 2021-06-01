<template>
    <div class="ml-auto flex items-center justify-center">
        <inertia-link :href="route('episode.edit',{'id':this.idC, 'idE':this.idE})" class="mr-2">
            <i class="fas fa-edit text-green-800"></i>
        </inertia-link>
        <inertia-link href="" class="mr-2">
            <i class="fas fa-trash text-red-800"></i>
        </inertia-link>
    </div>

</template>

<script>
    export default {
        props:{
            idC: Number,
            idE: Number
        }
    }

</script>
