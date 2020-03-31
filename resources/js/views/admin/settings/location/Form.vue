<template>

    <v-form v-model="valid" ref="location_form">
        <v-layout>
            <v-flex md5>
                <h3>Location Data</h3>

                <v-text-field
                    v-model="location.location"
                    :rules="nameRules"
                    :counter="80"
                    label="Location"
                    required
                    autofocus
                ></v-text-field>

                <v-textarea
                    v-model="location.description"
                    label="Description"
                ></v-textarea>



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
    import LocationApi from '../../../../api/Location'
        export default {
        name: 'location-form',
        created () {
            // LocationApi.role().then((res)=>{
            //     this.roles = res.body
            // })
            // LocationApi.findAllPermissions().then((res) => {
            //     this.permissions = res.body
            //     this.mappedPermissions = Util.groupBy(res.body, 'permissionType')
            // })
        },
        props: {
            location: {
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
                this.$refs.location_form.reset()
            },
            submit () {
                LocationApi.save(this.location).then((response) => {
                    this.$router.push({ name: 'admin.locations.index' })
                })
            }
        }
    }
</script>

<style scoped>
</style>
