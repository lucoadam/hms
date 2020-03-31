<template>
    <div>
        <v-layout row wrap mb20>
            <v-flex md10 mb20>
                <h2>Edit Department</h2>
            </v-flex>
            <v-flex md1>
                <v-btn fab :to="{ name: 'admin.departments.index' }" ><v-icon>arrow_back</v-icon></v-btn>
            </v-flex>

        </v-layout>
        <department-form :department="department"></department-form>
    </div>
</template>

<script>
    import DepartmentApi from '../../../../api/Department'
    import DepartmentForm from './Form'
    export default {
        components: { DepartmentForm },
        created () {
            DepartmentApi.findById(this.$route.params.id).then((response) => {
                this.department = response.body
            })
        },
        watch: {
            '$route' (to, from) {
                this.created()
            }
        },
        data () {
            return {
                department: {},
            }
        },
    }
</script>

<style scoped>
</style>
