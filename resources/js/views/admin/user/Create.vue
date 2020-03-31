<template>

    <div>

        <v-layout row wrap mb40>
            <v-flex md10 mb20>
                <h2>Add User</h2>
            </v-flex>
            <v-flex md1>
                <v-btn fab :to="{ name: 'admin.users.index' }" ><v-icon>arrow_back</v-icon></v-btn>
            </v-flex>
        </v-layout>

        <user-form :user="blankUser"></user-form>

    </div>

</template>

<script>
    import UserForm from './Form'
    export default {
        components: { UserForm },
        created () {
        },
        data () {
            return {
                blankUser: {
                    id: null,
                    name: '',
                    email: null,
                    password: null,
                    role: null,
                    username:null
                }
            }
        }
    }
</script>

<style scoped>
</style>
