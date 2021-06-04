<template>
    <button
        class="transition duration-500 ease-in-out border border-green-700 dark:text-white px-4 py-2 hover:shadow ml-auto focus:ring-0 focus:outline-none" :class="this.vu?' bg-green-800 text-white' : ''" @click="sabonné">
        {{this.vu?'Abonné' : 'S\'abonné'}}
    </button>
</template>

<script>
    export default {
        props: {
            idU: Number,
            abonne: Boolean
        },
        data(){
            return{
                 vu: this.abonne
            }
        },
        methods: {
            sabonné() {
                axios.post('/abonnement/sabonné', {
                        idU: this.idU
                    })
                    .then(rep => {
                        this.vu=!this.vu
                    })
                    .catch(err => {
                        console.log(err)
                    })
            }
        }
    }

</script>
