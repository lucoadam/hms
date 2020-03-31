<template>

    <v-form v-model="valid" ref="school_form">
        <v-layout>
            <v-flex md5>
                <h3>User Data</h3>

                <v-text-field
                    v-model="user.name"
                    :rules="nameRules"
                    :counter="80"
                    label="Name"
                    required
                    class="my-text-uppercase"
                    autofocus
                ></v-text-field>
                <v-text-field
                    v-model="user.email"
                    :rules="emailRules"
                    :counter="80"
                    type="email"
                    label="Email"
                    required
                ></v-text-field>
                <v-text-field
                    v-model="user.username"
                    required
                    label="Username"
                >
                </v-text-field>
                <v-text-field
                    v-model="user.password"
                    type="password"
                    required
                    label="Password"
                >
                </v-text-field>

                <v-select
                    v-model="user.role"
                    :items="roles"
                    label="User Role"
                    dense
                    v-on:focus="focusSelect"
                >

                </v-select>

                <!--<div v-for=" (permissionType, index) in mappedPermissions ">-->
                <!--<p>{{ index }}</p>-->

                <!--<div v-for=" permission in mappedPermissions[index] ">-->
                <!--<v-checkbox-->
                <!--:label="`${permission.displayName}`"-->
                <!--v-model="checkbox"-->
                <!--&gt;</v-checkbox>-->
                <!--</div>-->
                <!--</div>-->

                <v-text-field
                    v-if=" user.role == 'ROLE_SCHOOL' "
                    v-model="user.schoolId"
                    label="School Id"
                ></v-text-field>



                <v-btn
                    :disabled="!valid"
                    @click="submit"
                >
                    submit
                </v-btn>
                <v-btn @click="clear">clear</v-btn>
            </v-flex>

            <v-flex md5 offset-md1>

            </v-flex>
        </v-layout>
    </v-form>
</template>

<script>
    import UserApi from './../../../api/User'
    import Util from '../../../utils'
    export default {
        name: 'user-form',
        created () {
            // UserApi.role().then((res)=>{
            //     this.roles = res.body
            // })
            // UserApi.findAllPermissions().then((res) => {
            //     this.permissions = res.body
            //     this.mappedPermissions = Util.groupBy(res.body, 'permissionType')
            // })
        },
        props: {
            user: {
                type: Object,
                required: true
            }
        },
        data () {
            return {
                schoolTypes: [],
                disciplines: [],
                wards: [],
                valid: false,
                name: '',
                id: '',
                roles:[
                    'ROLE_ADMIN',
                    'ROLE_BRANCH',
                    'ROLE_LIBRARY',
                    'ROLE_STAFF',
                    'ROLE_STUDENT',

                ],
                mappedPermissions: {},
                permissions: [],
                nameRules: [
                    v => !!v || 'Name is required',
                    v => (v && v.length <= 80) || 'Name must be less than 80 characters',
                    v => (v && v.match(/^[A-z ]+$/g)) || 'Please provide valid name'
                ],
                emailRules: [
                    v => !!v || 'Email is required',
                    v => (v && Util.validateEmail(v)) || 'Please provide valid email'
                ],
                telephoneRules: [
                    v => !!v || 'Telephone number or Mobile number is required',
                    v => (v && v.match(/(9\d{9})|(0\d{8})/g)) || 'Please provide valid telephone number or mobile number'
                ],
                faxRules: [
                    v => !!v === false || v === null || v.length === 0 || (v && v.match(/0\d{8}/g)) || 'Please provide valid fax number'
                ],
                addressRules: [
                    v => !!v || 'Address is required',
                    v => (v && v.match(/^[A-z, ]+$/g)) || 'Please provide valid address'
                ]
            }
        },
        methods: {
            clear () {
                this.$refs.school_form.reset()
            },
            focusSelect(e){
                console.log(e);
                console.log('worl')
            },
            disciplineDoneBtn () {
                this.$refs.discipline.isMenuActive = false
                this.$refs.discipline.isFocused = false
                this.goTo('address')
            },
            submit () {
                UserApi.save(this.user).then((response) => {
                    this.$router.push({ name: 'admin.users.index' })
                })
            }
        }
    }
</script>

<style scoped>
</style>
