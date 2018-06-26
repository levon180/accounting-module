<template>
    <v-client-table :data="tableData" :columns="columns" :options="options">
        <div slot="actions" slot-scope="props">
            <a :href="'/accounts/' + props.row.id + '/edit'">
                <button class="btn btn-primary">Edit</button>
            </a>
            <button class="btn btn-danger" data-toggle="modal" data-target="#acceptDeletingModal" @click="openModal('accounts', props.row.id)">Delete</button>
        </div>
        <div slot="transactions" slot-scope="props">
            <a :href="'/accounts/' + props.row.id + '/transactions'">
                <button class="btn btn-primary">Transactions</button>
            </a>
        </div>
    </v-client-table>
</template>

<script>

    export default {
        data () {
            return {
                tableData: [],
                columns: ['id', 'name', 'transactions', 'actions'],
                options: {
                    sortable: ['id', 'name'],
                    sortIcon: {
                        base: 'fa',
                        up: 'fa-chevron-up',
                        down: 'fa-chevron-down',
                        is: 'fa-sort'
                    }
                }
            }
        },
        mounted() {
            console.log('Component mounted.');
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
                axios.get('/accounts-list')
                    .then(({data}) => {
                        this.tableData = data.data;
                        this.pageCount = data.count;
                    });
            }
        }
    }
</script>
