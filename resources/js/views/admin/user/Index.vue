<template>
    <v-card>
        <v-card-title>
            User
            <v-spacer></v-spacer>
            <v-text-field
                v-model="search"
                append-icon="search"
                label="Search"
                single-line
                hide-details
                style="max-width: 180px"
            ></v-text-field>
            <v-btn fab color="primary" :to="{name:'admin.users.create'}"><v-icon>add</v-icon></v-btn>
        </v-card-title>
                <v-dialog
                    v-model="deleteDialog"
                    max-width="400"
                >
                    <v-card>
                        <v-card-title class="headline">{{this.errorMessage?this.errorMessage:'Are you sure?'}}</v-card-title>
                        <v-card-actions>
                            <v-spacer></v-spacer>

                            <v-btn
                                color="green darken-1"
                                v-if="!this.errorMessage"
                                @click="deleteDialog = false"
                            >
                                No
                            </v-btn>

                            <v-btn
                                color="green darken-1"
                                @click="deleteItem"
                            >
                                {{this.errorMessage?'Ok':'Yes'}}
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
        <v-data-table
            :headers="headers"
            :items="users"
            :search="search"
        >
            <template v-slot:item.id="{item}">
                <span>{{users.indexOf(item)+1}}</span>
            </template>
            <template v-slot:item.actions="{item}">
                <v-btn icon v-if="(item.id!==$auth.user().id || item.role!=='ROLE_ADMIN')" danger  @click=" showDeleteDialog(item) "><v-icon>delete</v-icon></v-btn>
                <v-btn icon :to="{ name:'admin.users.edit', params: { id: item.id } }" primary><v-icon>create</v-icon></v-btn>
            </template>


        </v-data-table>

    </v-card>
<!--    <v-layout row wrap>-->
<!--        <v-flex md12>-->

<!--            <v-flex row justify-space-between>-->
<!--                <h1>Users</h1>-->
<!--                <v-btn fab :to="{name:'admin.user.create'}"><v-icon>add</v-icon></v-btn>-->
<!--            </v-flex>-->
<!--        <v-dialog-->
<!--            v-model="deleteDialog"-->
<!--            max-width="400"-->
<!--        >-->
<!--            <v-card>-->
<!--                <v-card-title class="headline">{{this.errorMessage?this.errorMessage:'Are you sure?'}}</v-card-title>-->
<!--                <v-card-actions>-->
<!--                    <v-spacer></v-spacer>-->

<!--                    <v-btn-->
<!--                        color="green darken-1"-->
<!--                        flat="flat"-->
<!--                        v-if="!this.errorMessage"-->
<!--                        @click="deleteDialog = false"-->
<!--                    >-->
<!--                        No-->
<!--                    </v-btn>-->

<!--                    <v-btn-->
<!--                        color="green darken-1"-->
<!--                        flat="flat"-->
<!--                        @click="deleteItem"-->
<!--                    >-->
<!--                        {{this.errorMessage?'Ok':'Yes'}}-->
<!--                    </v-btn>-->
<!--                </v-card-actions>-->
<!--            </v-card>-->
<!--        </v-dialog>-->
<!--        <v-data-table-->
<!--            :headers="headers"-->
<!--            :items="users"-->
<!--            multi-sort-->
<!--            class="elevation-1"-->
<!--        >-->
<!--            <template slot="items" slot-scope="props">-->
<!--                <td>{{ props.index +1}}</td>-->
<!--                <td>{{ props.item.username }}</td>-->
<!--                <td>{{ props.item.role }}</td>-->
<!--                <td><v-btn v-if="(props.item.id!=$auth.user().id || props.item.role!='ROLE_ADMIN')" danger flat @click=" showDeleteDialog(props.item) "><v-icon>delete</v-icon></v-btn><v-btn :to="{ name:'admin.users.edit', params: { id: props.item.id } }" primary flat><v-icon>create</v-icon></v-btn></td>-->
<!--            </template>-->
<!--        </v-data-table>-->
<!--        </v-flex>-->
<!--    </v-layout>-->

</template>

<script>
    import userApi from './../../../api/User'
    export default {
        data(){
            return {
                name:'Users',
                headers: [
                    {
                        text: '#',
                        align:'left',
                        sortable: true,
                        value: 'id',
                    },
                    { text: 'Name', value: 'name' },
                    { text: 'Email', value: 'email' },
                    { text: 'Role', value: 'role' },
                    { text: 'Actions',value: 'actions',width:'20%'}
                ],
                totalItems:null,
                loading:true,
                search:'',
                users:[],
                deleteDialog:false,
                deletingItem:null,
                errorMessage:null,
            }
        },
        created(){
            userApi.index().then((res)=>{
               this.users=res.body.data
            })
        },
        watch: {
            query: {
                handler () {
                    this.getDataFromApi()
                },
                deep: true
            }
        },
        methods:{
            getDataFromApi () {
                this.loading = true
                return UserApi.index().then((response) => {
                    console.log(response.body.data)
                    this.users = response.body.data
                    this.totalItems = response.body.totalElements
                })
            },
            deleteItem(){
                if(this.errorMessage){
                    this.errorMessage=null;
                    this.deleteDialog=false;
                }else {
                    userApi.delete(this.deletingItem.id).then((res) => {
                        if (res.body.success) {
                            let index = this.users.indexOf(this.deletingItem)
                            this.users.splice(index, 1)
                            this.deleteDialog = false
                        } else {
                            this.errorMessage = "This data is linked! Deletion unsuccessful"
                        }

                    })
                }
            },
            close () {
                this.dialog = false
                setTimeout(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                }, 300)
            },

            showDeleteDialog (item) {
                this.deletingItem = item
                this.deleteDialog = true
            }
        }
    }
</script>

<style scoped>

</style>
