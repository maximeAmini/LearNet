<template>
    <button type="button" v-if="this.wait"
        class="ml-auto flex items-center justify-center border-2 border-gray-200 p-1 focus:outline-none rounded-full h-7 w-7 transition duration-500 ease-in-out text-red-100" 
        disabled>
        <svg class="animate-spin h-5 w-5 text-rose-400" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
        </svg>
    </button>
    <button v-else-if="!this.vu"
        class="ml-auto flex items-center justify-center border-2 border-green-800 focus:outline-none rounded-full h-7 w-7 p-1 transition duration-500 ease-in-out text-green-700 hover:bg-green-700 hover:text-white"
        :class="isWatched" @click="toggelProg">
        <i class="fas fa-check text-sm"></i>
    </button>
    <button v-else
        class="ml-auto flex items-center justify-center border-2 border-red-800 focus:outline-none rounded-full h-7 w-7 p-1 transition duration-500 ease-in-out text-red-700 hover:bg-red-700 hover:text-white"
        :class="isWatched" @click="toggelProg">
        <i class="fas fa-times text-sm"></i>
    </button>
</template>

<script>
    export default {
        props: {
            'epId': Number,
            'watched': Object
        },
        data() {
            return {
                vu: false,
                wait:false
            }
        },
        methods: {
            toggelProg() {
                this.wait= true
                axios.post('/episodes/ToggelProg', {
                        epId: this.epId
                    })
                    .then(rep => {
                        this.vu = !this.vu
                        this.wait= false
                    })
                    .catch(err => {
                        console.log(err)
                    })
            },
            isWatched() {
                if (this.watched.find(el => el.id === this.epId)) {
                    return true
                } else {
                    return false
                }
            },
        },
        mounted() {
            this.vu = this.isWatched()
        }
    }

</script>
