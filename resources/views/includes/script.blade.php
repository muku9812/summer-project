<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend/dist/js/demo.js')}}"></script>



{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>--}}
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />--}}
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">--}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<style>
    body{
        font-size:16px;
    }
</style>

<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var transactions = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/updateStatus',
                data: {'status': status, 'transactions': id},
                success: function(data){
                    console.log(data.success)
                }
            });
        })
    })
</script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );
</script>

{{--<script>--}}
{{--$(document).ready(function() {--}}
{{--var eventFired = function ( type ) {--}}
{{--var n = $('#tables')[0];--}}
{{--n.innerHTML += '<div>'+type+' event - '+new Date().getTime()+'</div>';--}}
{{--n.scrollTop = n.scrollHeight;--}}
{{--}--}}

{{--$('#datatable')--}}
{{--.on( 'order.dt',  function () { eventFired( 'Order' ); } )--}}
{{--.on( 'search.dt', function () { eventFired( 'Search' ); } )--}}
{{--.on( 'page.dt',   function () { eventFired( 'Page' ); } )--}}
{{--.DataTable();--}}
{{--} );--}}

{{--</script>--}}
@yield('js')
