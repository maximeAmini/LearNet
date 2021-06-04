<template>
    <div>
        <jet-banner />

        <div class="min-h-screen">
            <nav class="w-full shadow-lg fixed bg-white dark:bg-gray-900 dark:text-white z-10">
                <!-- Primary Navigation Menu -->
                <div class="w-full px-3">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex-shrink-0 flex items-center">
                                <!-- Hamburger -->
                                <div class="-mr-2 flex items-center sm:hidden">
                                    <button @click="showingNavigationDropdown = ! showingNavigationDropdown"
                                        class="inline-flex items-center justify-center p-2 text-gray-400 focus:outline-none transition duration-500 ease-in-out">
                                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <path
                                                :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h16" />
                                            <path
                                                :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <!-- Logo -->
                                <inertia-link :href="route('dashboard')">
                                    <jet-application-mark class="block pl-4 h-9 w-auto" />
                                </inertia-link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <jet-nav-link v-for="link in this.links" v-bind:key="link.name"
                                    :href="route(link.route)" :active="route().current(link.route)">
                                    {{link.name}}
                                </jet-nav-link>
                            </div>
                        </div>

                        <div class="sm:flex sm:items-center sm:justify-center sm:ml-6">
                            <form @submit.prevent="submit" class="lg:flex hidden">
                                <input type="search" name="search" id="search" placeholder="Recherche..."
                                    class="py-1 px-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-0 focus:border-green-600 mr-4 bg-gray-100 dark:bg-gray-700"
                                    @keyup.enter="submit" v-model="this.search">
                            </form>
                            <!-- Settings Dropdown -->
                            <div class="ml-3 mt-3 mr-3 sm:mt-0 relative">
                                <jet-dropdown align="right" width="48">
                                    <template #trigger>
                                        <img :src="this.user.profile_photo_url"
                                            class="cursor-pointer rounded-full h-8 w-8" />
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <jet-dropdown-link :href="route('profile.show')">
                                            Profile
                                        </jet-dropdown-link>

                                        <jet-dropdown-link :href="route('dark')" @click="toDark">
                                            dark
                                        </jet-dropdown-link>

                                        <jet-dropdown-link :href="route('api-tokens.index')"
                                            v-if="$page.props.jetstream.hasApiFeatures">
                                            API Tokens
                                        </jet-dropdown-link>

                                        <div class="border-t border-gray-100"></div>

                                        <!-- Authentication -->
                                        <form @submit.prevent="logout">
                                            <jet-dropdown-link as="button">
                                                Déconnection
                                            </jet-dropdown-link>
                                        </form>
                                    </template>
                                </jet-dropdown>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}"
                    class="sm:hidden transition duration-500 ease-in-out">
                    <form @submit.prevent="submit" class="p-3 w-full">
                        <input type="search" name="search" id="search" placeholder="Recherche..."
                            class="py-1 px-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-0 focus:border-green-600 mr-4 bg-gray-100 dark:bg-gray-700 w-full"
                            @keyup.enter="submit" v-model="this.search">
                    </form>
                    <div class="pt-2 pb-3 space-y-1 pb-1 border-b border-gray-100 dark:border-gray-700">
                        <jet-responsive-nav-link v-for="link in this.links" v-bind:key="link.name"
                            :href="route(link.route)" :active="route().current(link.route)">
                            {{link.name}}
                        </jet-responsive-nav-link>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="h-full pt-24 px-4 sm:px-20 mb-8">
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    import JetBanner from '@/Jetstream/Banner'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetNavLink from '@/Jetstream/NavLink'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'
    import {
        Inertia
    } from '@inertiajs/inertia'

    export default {
        components: {
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
        },
        props: ['user'],
        data() {
            return {
                showingNavigationDropdown: false,
                links: [{
                        name: "Tableau de bord",
                        route: 'dashboard',
                    },
                    {
                        name: "Liste de formation",
                        route: 'cours.index'
                    },
                ],
                search: ''
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
            submit() {
                Inertia.get(this.route('cours.search', {
                    search: this.search
                }))
            }
        }
    }

</script>

<style>
    *::-webkit-scrollbar {
        width: 8px;
    }

    *::-webkit-scrollbar-track {
        background: transparent;
        padding: 10px;
    }

    *::-webkit-scrollbar-thumb {
        background-color: rgba(5, 150, 105);
        border-radius: 100px;
    }

    *::-webkit-scrollbar-thumb:hover {
        background-color: rgba(4, 120, 87);
    }

    /* Pour firefox */
    * {
        scrollbar-width: 8px;
        scrollbar-color: blue rgba(5, 150, 105);
    }

</style>
