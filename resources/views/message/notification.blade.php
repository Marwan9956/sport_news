@if($errors->any())
     <notification 
          alert_class ="alert-danger"
          type   = "error"
          errors = "{{ json_encode($errors->all())}} ">
     </notification>
@elseif(Session::has('success'))
     <notification 
          alert_class="alert-success"
          type   = "sucess"
          sucess ="{{ Session::get('success') }}">
     </notification>                 
@endif

