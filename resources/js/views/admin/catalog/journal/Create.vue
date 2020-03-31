<template>

    <div>

        <v-layout row wrap mb40>
            <v-flex md10 mb20>
                <h2>Add Branch</h2>
            </v-flex>
            <v-flex md1>
                <v-btn fab :to="{ name: 'admin.branches.index' }" ><v-icon>arrow_back</v-icon></v-btn>
            </v-flex>
        </v-layout>

        <branch-form :branch="blankBranch"></branch-form>

    </div>

</template>

<script>
    import BranchForm from './Form'
    export default {
        components: { BranchForm },
        created () {
        },
        data () {
            return {
                blankBranch: {
                    name: '',
                    description:'',
                }
            }
        }
    }
</script>

<style scoped>
</style>
