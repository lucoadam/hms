<template>
    <v-card>
        <v-card-title>
            Institutes
            <v-spacer></v-spacer>
            <v-text-field
                v-model="search"
                append-icon="search"
                label="Search"
                single-line
                hide-details
                style="max-width: 180px"
            ></v-text-field>
            <v-btn fab color="primary" :to="{name:'admin.institutes.create'}"><v-icon>add</v-icon></v-btn>
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
            :items="items"
            :search="search"
        >
            <template v-slot:item.id="{item}">
                <span>{{items.indexOf(item)+1}}</span>
            </template>
            <template v-slot:item.actions="{item}">
                <v-btn icon danger  @click=" showDeleteDialog(item) "><v-icon>delete</v-icon></v-btn>
                <v-btn icon :to="{ name:'admin.institutes.edit', params: { id: item.id } }" primary><v-icon>create</v-icon></v-btn>
            </template>


        </v-data-table>

    </v-card>
</template>

<script>
    import InstituteApi from '../../../../api/Institute'
    export default {
        data(){
            return {
                headers: [
                    {
                        text: '#',
                        align:'left',
                        sortable: true,
                        value: 'id',
                    },
                    { text: 'Name', value: 'name' },
                    { text: 'Abbreviation', value: 'abbr' },
                    { text: 'Full Abbreviation', value: 'full_abbr' },
                    { text: 'Actions',value: 'actions',width:'20%'}
                ],
                totalItems:null,
                loading:true,
                search:'',
                items:[],
                deleteDialog:false,
                deletingItem:null,
                errorMessage:null,
            }
        },
        created(){
            InstituteApi.index().then((res)=>{
               this.items=res.body.data
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
                return InstituteApi.index().then((response) => {
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
                    InstituteApi.delete(this.deletingItem.id).then((res) => {
                        if (res.body.success) {
                            let index = this.items.indexOf(this.deletingItem)
                            this.items.splice(index, 1)
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
