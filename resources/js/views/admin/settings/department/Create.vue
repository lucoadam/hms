<template>

    <div>

        <v-layout row wrap mb40>
            <v-flex md10 mb20>
                <h2>Add Department</h2>
            </v-flex>
            <v-flex md1>
                <v-btn fab :to="{ name: 'admin.departments.index' }" ><v-icon>arrow_back</v-icon></v-btn>
            </v-flex>
        </v-layout>

        <department-form :department="blankDepartment"></department-form>

    </div>

</template>

<script>
    import DepartmentForm from './Form'
    export default {
        components: { DepartmentForm },
        created () {
        },
        data () {
            return {
                blankDepartment: {
                    name: '',
                    description:'',
                }
            }
        }
    }
</script>

<style scoped>
</style>
