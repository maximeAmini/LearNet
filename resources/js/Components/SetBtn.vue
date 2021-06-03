<template>
    <div class="ml-auto flex items-center justify-center">
        <inertia-link :href="route('episodes.edit',{'cour':this.idC, 'episode':this.idE})" class="mr-2">
            <i class="fas fa-edit text-green-800"></i>
        </inertia-link>
        <a @click="supp" class="mr-2">
            <i class="fas fa-trash text-red-800 cursor-pointer"></i>
        </a>
    </div>

</template>

<script>
    export default {
        props:{
            idC: Number,
            idE: Number
        },
        methods:{
            supp(){
                this.$inertia.delete(route('episodes.destroy',{'cour':this.idC, 'episode':this.idE}));
            }
        }
    }

</script>
