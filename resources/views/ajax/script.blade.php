<script>
    $(document).ready(function(){
       $('#transactions_table').DataTable()
    });
    $(function(){
       $('.toggle-class').change(function(){
          var status = $(this).pop('checked')==true ? 1 :0;
          var transaction_id = $(this).data('id');
          $.ajax({
             type : "GET",
             datatype: "json",
              url : '/changeStatus',
              datas : {'status': status,'transaction_id':transaction_id}
              success : function(data){
                 console.log(data.success)
              }

          });
       });
    });

</script>
