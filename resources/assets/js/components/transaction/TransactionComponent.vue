<template>
    <v-client-table :data="tableData" :columns="columns" :options="options">
        <div slot="actions" slot-scope="props">
            <a :href="'/transactions/' + props.row.id + '/edit'">
                <button class="btn btn-primary">Edit</button>
            </a>
            <button class="btn btn-danger" data-toggle="modal" data-target="#acceptDeletingModal" @click="openModal('transactions', props.row.id)">Delete</button>
        </div>
    </v-client-table>
</template>

<script>

    export default {
        data () {
            return {
                tableData: [],
                columns: ['id', 'account_name', 'description', 'amount', 'type', 'created_date', 'actions'],
                options: {
                    sortable: ['id', 'account_name', 'description', 'amount', 'type', 'created_date'],
                    sortIcon: {
                        base: 'fa',
                        up: 'fa-chevron-up',
                        down: 'fa-chevron-down',
                        is: 'fa-sort'
                    }
                }
            }
        },
        props: ['accountId'],
        mounted() {
            this.getData();
        },
        methods: {
            openModal (type, id)
            {
                var action = '/' + type + '/' + id;

                $("#modal-form").attr('action', action);
                $("#record-type").text(type);
            },
            getData () {
                var param = '';

                if("undefined" !== typeof this.accountId) {
                    param = '/' +   this.accountId;
                }

                axios.get('/transactions-list' + param)
                    .then(({data}) => {
                        this.tableData = data.data;
                        this.pageCount = data.count;
                    });
            }
        }
    }
</script>
