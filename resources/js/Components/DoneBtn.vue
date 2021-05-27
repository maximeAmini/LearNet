<template>
    <button v-if="!vu"
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
                vu: false
            }
        },
        methods: {
            toggelProg() {
                axios.post('/episodes/ToggelProg', {
                        epId: this.epId
                    })
                    .then(rep => {
                        this.vu=!this.vu
                        //eventBus.emit('toggelProg', rep.data)
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
