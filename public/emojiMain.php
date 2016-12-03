 <p><a tabindex="0" class="btn btn-sm btn-danger" role="button" 
data-toggle="popover"  title="Dismissible popover"  data-placement="top"
data-content="<?php include 'emoji.php'; ?>">Dismissible popover</a></p>
<p id='test33'>Test</p>



<script type='text/javascript'>
var foo = function(param)
{
   var temp= param.classList;
   var mes=document.getElementById('message');
 
   
   var newI = document.createElement('i');
 newI.className=temp;
var test33=document.getElementById('test33');
test33.appendChild(newI);
};
</script>	