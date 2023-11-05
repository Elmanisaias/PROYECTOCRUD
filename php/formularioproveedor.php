<?php
include "conexion.php";

$user_id=null;
$sql1= "select * from proveedor where id = ".$_GET["id"];
$query = $con->query($sql1);
$proveedor = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $proveedor=$r;
  break;
}

  }
?>

<?php if($proveedor!=null):?>

<form role="form" id="actualizar" >
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" value="<?php echo $proveedor->nombre; ?>" name="name" required>
  </div>
  <div class="form-group">
    <label for="lastname">Apellido</label>
    <input type="text" class="form-control" value="<?php echo $proveedor->apellido; ?>" name="lastname" required>
  </div>
  <div class="form-group">
    <label for="address">Direccion</label>
    <input type="text" class="form-control" value="<?php echo $proveedor->direccion; ?>" name="address" required>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" value="<?php echo $proveedor->email; ?>" name="email" >
  </div>
  <div class="form-group">
    <label for="phone">Telefono</label>
    <input type="text" class="form-control" value="<?php echo $proveedor->telefono; ?>" name="phone" >
  </div>
<input type="hidden" name="id" value="<?php echo $proveedor->id; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    $.post("./php/actualizarproveedor.php",$("#actualizar").serialize(),function(data){
    });
    //alert("Agregado exitosamente!");
    //$("#actualizar")[0].reset();
    $('#editModal').modal('hide');
$('body').removeClass('modal-open');
$('.modal-backdrop').remove();
    loadTabla();
  });
</script>

<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>