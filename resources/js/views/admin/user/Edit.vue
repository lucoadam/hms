<template>
    <v-form v-model="valid" ref="school_form">
        <v-layout row wrap mb40>
            <v-flex md10 mb20>
                <h2>Change Password</h2>
            </v-flex>
            <v-flex md1>
                <v-btn fab :to="{ name: 'admin.users.index' }" ><v-icon>arrow_back</v-icon></v-btn>
            </v-flex>
        </v-layout>
        <v-layout>
            <v-flex md5>


                <v-text-field
                    v-model="user.name"
                    label="Name"
                    class="my-text-uppercase"
                    readonly
                    outline
                ></v-text-field>

                <v-text-field
                    v-model="user.username"
                    required
                    label="Username"
                    readonly
                    outline
                >
                </v-text-field>

                <v-text-field
                    v-model="password"
                    type="password"
                    required
                    label="Password"
                    :rules="passwordRules"
                >
                </v-text-field>

                <v-btn
                    :disabled="!valid"
                    @click="changePassword"
                >
                    submit
                </v-btn>
            </v-flex>
        </v-layout>
    </v-form>
</template>

<script>
    import UserApi from './../../../api/User'
    export default {
        created () {
            UserApi.findById(this.$route.params.id).then((response) => {
                this.user = response.body
            })
        },
        watch: {
            '$route' (to, from) {
                this.created()
            }
        },
        data () {
            return {
                valid: false,
                password: null,
                user: {},
                passwordRules: [
                    v => !!v || 'Password is required'
                ]
            }
        },
        methods: {
            changePassword () {
                UserApi.update({
                    id: this.user.id,
                    password: this.password
                }).then((res) => {
                    alert('Successfully changed')
                }).catch((err) => {
                    alert('Something Went Wrong')
                })
            }
        }
    }
</script>

<style scoped>
</style>
