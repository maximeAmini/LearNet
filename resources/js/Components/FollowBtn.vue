<template>
    <button
        class="flex items-center transition duration-500 ease-in-out border border-green-700 dark:text-white px-4 py-2 hover:shadow ml-auto focus:ring-0 focus:outline-none" :class="this.vu?' bg-green-800 text-white' : ''" @click="sabonné">
        <svg v-if="this.wait" class="animate-spin h-5 w-5 text-rose-400 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
        </svg>
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
                 vu: this.abonne,
                 wait:false
            }
        },
        methods: {
            sabonné() {
                this.wait= true
                axios.post('/abonnement/sabonné', {
                        idU: this.idU
                    })
                    .then(rep => {
                        this.vu=!this.vu
                        this.wait= false
                    })
                    .catch(err => {
                        console.log(err)
                    })
            }
        }
    }

</script>
