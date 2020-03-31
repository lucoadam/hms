<template>
<v-container fluid fill-height>
    <v-layout align-center justify-center>
        <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
                <v-toolbar  color="deep-purple accent-4"
                            dense
                            dark height="50px">
                    <v-toolbar-title>Login form</v-toolbar-title>
                    <v-spacer></v-spacer>
                </v-toolbar>
                <div style="text-align: center;" v-show="loginError">Invalid username or Password</div>
                <v-card-text>
                    <v-form v-on:submit.prevent="login">
                        <v-text-field prepend-icon="person" v-model="username" label="Username" type="text"
                                      @change="loginError = false"></v-text-field>
                        <v-text-field id="password" prepend-icon="lock" v-model="password" label="Password" type="password"
                                      @change="loginError = false" v-on:keyup.enter="login"></v-text-field>
                    </v-form>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="primary" @click="login">Login</v-btn>
                </v-card-actions>
            </v-card>
        </v-flex>
    </v-layout>
</v-container>
</template>

<script>
    export default {
        name: "Login",
        data () {
            return {
                username: '',
                password: '',
                loginError: false
            }
        },
        methods: {
            login () {
                this.$auth.login({
                        url:'/api/auth/login/',
                        method: 'POST',
                        body: {
                            username: this.username,
                            password: this.password
                        },
                        success: (response) => {
                            //console.log('some response',response)
                            console.log(response, 'where here', this.$auth.user())
                            if (!this.$auth.user().forcePasswordChange) {
                                this.$router.push({ name: (this.$auth.check('ROLE_ADMIN') ? 'admin.' : '') + 'home' })
                            } else {
                                this.$router.push({ name: 'auth.change-password' })
                            }
                        },
                        error: (err) => {
                            console.log(err)
                            this.loginError = true
                        },
                        rememberMe: true,
                        fetchUser: true,
                        redirect: null
                    }
                )
            }
        }
    }
</script>

<style scoped>

</style>
