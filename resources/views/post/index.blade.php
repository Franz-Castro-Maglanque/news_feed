@extends('layouts.app')
@section('content')

    <div  id="show_data">

    </div>


    <script type="text/javascript">

        $(document).ready(function(){
        
            get_data();
           

                function get_data(){
                    var action = '';
                    $.ajaxSetup({
                                headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
                                });
                    $.ajax({
                        url:"data",
                        method:"POST",
                        data:{action:action},
                        success:function(data){
                            $('#show_data').html(data);
                        }
                    });
                }


     
        });
        </script>
@endsection