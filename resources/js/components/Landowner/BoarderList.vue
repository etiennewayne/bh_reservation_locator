<template>
    <div>
        <div class="section">
            <div class="columns">
                <div class="column">

                    <div class="columns is-centered">
                        <div class="column is-10">
                            <div class="panel">
                                <div class="panel-heading">
                                    BOARDER LIST
                                </div>

                                <div class="panel-body">

                                    <div class="level">
                                        <div class="level-left">
                                            <b-field label="Page">
                                                <b-select v-model="perPage" @input="setPerPage">
                                                    <option value="5">5 per page</option>
                                                    <option value="10">10 per page</option>
                                                    <option value="15">15 per page</option>
                                                    <option value="20">20 per page</option>
                                                </b-select>
                                                <b-select v-model="sortOrder" @input="loadAsyncData">
                                                    <option value="asc">ASC</option>
                                                    <option value="desc">DESC</option>

                                                </b-select>
                                            </b-field>
                                        </div>

                                        <div class="level-right">
                                            <div class="level-item">
                                                <b-field label="Search">
                                                    <b-input type="text"
                                                             v-model="search.bedspace" placeholder="Search Bedspace"
                                                             @keyup.native.enter="loadAsyncData"/>
                                                    <p class="control">
                                                        <b-button type="is-primary" icon-right="account-filter" @click="loadAsyncData"/>
                                                    </p>
                                                </b-field>
                                            </div>
                                        </div>
                                    </div>

                                    <!--                                    <div class="buttons mt-3 is-right">-->
                                    <!--                                        <b-button tag="a" href="/boarding-house/create" icon-right="account-arrow-up-outline" class="is-success">NEW BOARDING HOUSE</b-button>-->
                                    <!--                                    </div>-->

                                    <b-table
                                        :data="data"
                                        :loading="loading"
                                        paginated
                                        backend-pagination
                                        :total="total"
                                        :per-page="perPage"
                                        @page-change="onPageChange"
                                        aria-next-label="Next page"
                                        aria-previous-label="Previous page"
                                        aria-page-label="Page"
                                        aria-current-label="Current page"
                                        backend-sorting
                                        :default-sort-direction="defaultSortDirection"
                                        @sort="onSort">

                                        <b-table-column field="book_bedspace_id" label="ID" v-slot="props">
                                            {{ props.row.boarder_id }}
                                        </b-table-column>

                                        <b-table-column field="bhouse_name" label="Boarding House" v-slot="props">
                                            {{ props.row.bhouse_name }}
                                        </b-table-column>

                                        <b-table-column field="room_no" label="Room No" v-slot="props">
                                            {{ props.row.room_no }}
                                        </b-table-column>

                                        <b-table-column field="bedspace_name" label="Bed Space Name" v-slot="props">
                                            {{ props.row.bedspace_name }}
                                        </b-table-column>

                                        <b-table-column field="boarder_name" label="Boarder Name" v-slot="props">
                                            {{ props.row.lname }}, {{ props.row.fname }} {{ props.row.mname }}
                                        </b-table-column>

                                        <b-table-column field="date_acceptance" label="Start Date" v-slot="props">
                                            {{ props.row.date_acceptance }}
                                        </b-table-column>

                                        <b-table-column field="price" label="Rental Price" v-slot="props">
                                            {{ props.row.rental_price }}
                                        </b-table-column>

                                        <b-table-column label="Action" v-slot="props">
                                            <b-dropdown aria-role="list">
                                                <template #trigger="{ active }">
                                                    <b-button
                                                        label="..."
                                                        type="is-primary"
                                                        class="is-small"
                                                        :icon-right="active ? 'menu-up' : 'menu-down'" />
                                                </template>

                                                <b-dropdown-item aria-role="listitem" @click="openSendBill(props.row)">Send Bill</b-dropdown-item>
                                                <b-dropdown-item aria-role="listitem" @click="">Remove as boarder</b-dropdown-item>

                                            </b-dropdown>
                                            <!-- <div class="is-flex">
                                                <b-button class="button is-small is-warning mr-1" tag="a" icon-right="pencil" @click="getData(props.row.bhouse_id)"></b-button>
                                                <b-button class="button is-small is-danger mr-1" icon-right="delete" @click="confirmDelete(props.row.bhouse_id)"></b-button>
                                            </div> -->
                                        </b-table-column>
                                    </b-table>

                                </div><!--panel -body -->
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- column parent -->
        </div><!--cols parent -->



        <!--modal create-->
        <b-modal v-model="modalSendBill" has-modal-card
                 trap-focus
                 :width="640"
                 aria-role="dialog"
                 aria-label="Modal"
                 aria-modal>

            <form @submit.prevent="submitSendBill">
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Send Bill</p>
                        <button
                            type="button"
                            class="delete"
                            @click="modalSendBill = false"/>
                    </header>

                    <section class="modal-card-body">
                        <div class="">
                            <div class="columns">
                                <div class="column">
                                    <b-field label="Payment Date">
                                        <b-datepicker v-model="fields.payment_date"></b-datepicker>
                                    </b-field>
                                    <b-field label="Amount to pay">
                                        <b-numberinput v-model="fields.amount_to_pay"></b-numberinput>
                                    </b-field>
                                </div><!-- column -->
                            </div>
                        </div>
                    </section>

                    <footer class="modal-card-foot">
                        <b-button
                            label="Close"
                            @click="modalSendBill=false"/>
                        <button
                            label="Save"
                            class="button is-link">SEND</button>
                    </footer>
                </div>
            </form><!--close form-->
        </b-modal>
        <!--close modal-->

    </div>
</template>


<script>

export default{


    data(){
        return{
            data: [],
            total: 0,
            loading: false,
            sortField: 'boarder_id',
            sortOrder: 'desc',
            page: 1,
            perPage: 5,
            defaultSortDirection: 'asc',

            search: {
                bedspace: '',
            },

            fields: {
                payment_date: new Date(),
                npayment_date: null,
            },

            modalSendBill: false,

            rawData: {},


            btnClass: {
                'is-success': true,
                'button': true,
                'is-loading':false,
            },
        }
    },
    methods: {
        /*
        * Load async data
        */
        loadAsyncData() {
            const params = [
                `sort_by=${this.sortField}.${this.sortOrder}`,
                `perpage=${this.perPage}`,
                `page=${this.page}`
            ].join('&')

            this.loading = true
            axios.get(`/get-boarder-list?${params}`)
                .then(({ data }) => {
                    this.data = [];
                    let currentTotal = data.total
                    if (data.total / this.perPage > 1000) {
                        currentTotal = this.perPage * 1000
                    }

                    this.total = currentTotal
                    data.data.forEach((item) => {
                        //item.release_date = item.release_date ? item.release_date.replace(/-/g, '/') : null
                        this.data.push(item)
                    })
                    this.loading = false
                })
                .catch((error) => {
                    this.data = []
                    this.total = 0
                    this.loading = false
                    throw error
                })
        },
        /*
        * Handle page-change event
        */
        onPageChange(page) {
            this.page = page
            this.loadAsyncData()
        },

        onSort(field, order) {
            this.sortField = field
            this.sortOrder = order
            this.loadAsyncData()
        },

        setPerPage(){
            this.loadAsyncData()
        },

        openSendBill(row){
            this.modalSendBill = true;
            this.rawData = row;
            this.fields.payment_date = new Date(row.date_acceptance);
            this.fields.amount_to_pay = row.rental_price;
        },


        submitSendBill: function(){
            this.fields.boarder_id = this.rawData.boarder_id;
            let d = new Date();
            this.fields.npayment_date = new Date(d.getFullYear(), d.getMonth(), this.fields.payment_date.getDate()).toLocaleDateString();


            axios.post('/boarder-submit-bill', this.fields).then(res=>{
                if(res.data.status === 'saved'){
                    this.$buefy.dialog.alert({
                        title: 'SAVED!',
                        message: 'Save successfully.',
                        type: 'is-success',
                        onConfirm: ()=> {
                            this.loadAsyncData();
                            this.modalSendBill = false;
                            this.rawData = {};
                        }
                    });
                }
            })
        },



    },

    mounted() {
       this.loadAsyncData()
    }


}
</script>


<style scoped>
    .modal .animation-content .modal-card {
        overflow: visible !important;
    }

    .modal-card-body {
        overflow: visible !important;
    }
</style>
