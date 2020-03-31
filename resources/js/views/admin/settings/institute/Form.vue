<template>

    <v-form v-model="valid" ref="institute_form">
        <v-layout>
            <v-flex md5>
                <h3>Institute Data</h3>

                <v-text-field
                    v-model="institute.name"
                    :rules="nameRules"
                    :counter="80"
                    label="Name"
                    required
                    autofocus
                ></v-text-field>

                <v-text-field
                    v-model="institute.full_abbr"
                    label="Full Abbreviation"
                ></v-text-field>

                <v-text-field
                    v-model="institute.abbr"
                    label="Abbreviation"
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
    import InstituteApi from '../../../../api/Institute'
        export default {
        name: 'institute-form',
        created () {
            // InstituteApi.role().then((res)=>{
            //     this.roles = res.body
            // })
            // InstituteApi.findAllPermissions().then((res) => {
            //     this.permissions = res.body
            //     this.mappedPermissions = Util.groupBy(res.body, 'permissionType')
            // })
        },
        props: {
            institute: {
                type: Object,
                required: true
            }
        },
        data () {
            return {
                valid: false,
                name: '',
                id: '',
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
                this.$refs.institute_form.reset()
            },
            submit () {
                InstituteApi.save(this.institute).then((response) => {
                    this.$router.push({ name: 'admin.institutes.index' })
                })
            }
        }
    }
</script>

<style scoped>
</style>
