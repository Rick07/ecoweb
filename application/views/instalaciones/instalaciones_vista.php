<div id="PersonTableContainer" style="width: 600px;"></div>
 <script type="text/javascript">
    $(document).ready(function () {
        $('#PersonTableContainer').jtable({
            title: 'Instalaciones',
            actions: {
                listAction: '/GettingStarted/PersonList',
                createAction: '/GettingStarted/CreatePerson',
                updateAction: '/GettingStarted/UpdatePerson',
                deleteAction: '/GettingStarted/DeletePerson'
            },
            fields: {
                PersonId: {
                    key: true,
                    list: false
                },
                Name: {
                    title: 'ID',
                    type: 'textarea',
                    width: '40%'
                },
                Age: {
                    title: 'Nombre',
                    width: '20%'
                },
                RecordDate: {
                    title: 'Tipo',
                    width: '30%',
                    type: 'date',
                    create: false,
                    edit: false
                }
            }
        });
    });
</script>