// <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

$('#search').on('keyup',function(){
$value=$(this).val(); 
$.ajax({
type : 'get',
url : '{{URL::to('search')}}',
data:{'search':$value},
success:function(data){
$('tbody').html(data);
}
});
})
 function alertfunction() {
    confirm("Are you sure you want to delete this?");
}
