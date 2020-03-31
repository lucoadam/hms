<template>
    <v-app>
    <div>
        <v-app-bar
            color="deep-purple accent-4"
            dense
            dark
        >
            <v-btn class="d-sm-flex" @click.stop="drawer=!drawer" icon>
                <v-icon>view_headline</v-icon>
            </v-btn>

            <v-toolbar-title>Library</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn text color="#fff" style="font-size: 12px;height:38px;" v-for="menuItem in menuItems" :key="menuItem.route+menuItems.indexOf(menuItem)" :to="{ name: menuItem.route }">{{ menuItem.title }}</v-btn>
            </v-toolbar-items>

            <v-menu
                left
                bottom
                v-if="$auth.check()"
            >
                <template v-slot:activator="{ on }">
                    <v-btn icon v-on="on">
                        <v-icon>person</v-icon>
                    </v-btn>
                </template>

                <v-list class="mt-12">
                    <v-list-item>
                        <v-list-item-title>
                            {{$auth.user().username}}
                        </v-list-item-title>
                    </v-list-item>
                    <v-list-item  class="v-list-item--link">
                        <v-list-item-title @click="logout">Logout</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-app-bar>
        <v-navigation-drawer
            v-model="drawer"
            absolute
            temporary
           expand-on-hover
        >
            <v-list-item v-if="$auth.check()" class="px-2">
                <v-list-item-avatar>
                    <v-img src="https://randomuser.me/api/portraits/women/85.jpg"></v-img>
                </v-list-item-avatar>
            </v-list-item>

            <v-list-item v-if="$auth.check()"  link>
                <v-list-item-content>
                    <v-list-item-title class="title">{{$auth.user().name}}</v-list-item-title>
                    <v-list-item-subtitle>{{$auth.user().email}}</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>

            <v-divider v-if="$auth.check()" ></v-divider>

            <v-list dense>

                <v-list-item
                    v-for="item in menuItems"
                    :key="item.title"
                    link
                    :to="{name:item.route}"
                >
                    <v-list-item-icon>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-item-icon>

                    <v-list-item-content>
                        <v-list-item-title>{{ item.title }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
    </div>
        <v-content>
            <v-container>

                <router-view></router-view>

            </v-container>
        </v-content>
    </v-app>
</template>

<script>
    import  MetaApi from './api/metas'
    import MenuItems from './menus';
    export default {
        name: "App",
        data () {
            return {
                drawer: null,
                menuItems: [
                    { title: 'Home', icon: 'dashboard',route:'login' },
                    { title: 'About', icon: 'question_answer',route:'login' },
                ],
                mini:true,
            }
        },
        created () {
            // console.log(this.$router.options.routes)
            this.$bus.$on('error.on.refresh', (err) => {
                this.$auth.logout()
                this.$router.push({ name: 'auth.login' })
            })

            Bus.$on('load.metas', () => {
                MetaApi.index().then((res) => {
                    this.$store.commit('core/mapAndStoreAllMetas', res.body)
                    Bus.$emit('menu.change');
                })
            })
        },
        mounted () {
            Bus.$emit('load.metas')
            this.changeMenuItems()
            this.$bus.$on('user.fetched', this.setUser)
            this.$bus.$on('menu.change', this.changeMenuItems)
        },
        methods:{
            logout(){
                console.log('This is bus');
                console.log(this.$bus);
                this.$auth.logout();
                console.log(this.$auth.user())
                this.$bus.$on('menu.change', this.changeMenuItems)
                this.$bus.$emit('user.fetched',null)
            },
            changeMenuItems () {
                if (this.$auth.check('ROLE_ADMIN')) { this.menuItems = MenuItems.admin }
                if (this.$auth.check('ROLE_SCHOOL')) { this.menuItems = MenuItems.school }
                if (!this.$auth.check()) { this.menuItems = MenuItems.general }
                this.menuItems = this.menuItems.filter((item) => {
                    for (let key in item.meta) {
                        if (( item.meta[key] || item.meta[key] === null ) && this.$store.state.core.metas[key] !== item.meta[key]) { return false }
                    }
                    return true
                })
            },
            setUser (user) {
                this.$store.commit('core/setUser', user)
                this.changeMenuItems ()
            }
        }

    }
</script>

<style scoped>

</style>
