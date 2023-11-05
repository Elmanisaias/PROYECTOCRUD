<?php
include "conexion.php";

$user_id=null;
$sql1= "select * from producto where id = ".$_GET["id"];
$query = $con->query($sql1);
$producto = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $producto=$r;
  break;
}

  }
?>

<?php if($producto!=null):?>

<form role="form" id="actualizar" >
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" value="<?php echo $producto->nombre; ?>" name="name" required>
  </div>
  <div class="form-group">
    <label for="lastname">Descripcion</label>
    <input type="text" class="form-control" value="<?php echo $producto->descripcion; ?>" name="lastname" required>
  </div>
  <div class="form-group">
    <label for="address">Precio</label>
    <input type="text" class="form-control" value="<?php echo $producto->precio; ?>" name="address" required>
  </div>
  <div class="form-group">
    <label for="email">Stock</label>
    <input type="text" class="form-control" value="<?php echo $producto->stock; ?>" name="email" >
  </div>
  <div class="form-group">
    <label for="phone">Categoria</label>
    <input type="text" class="form-control" value="<?php echo $producto->categoria; ?>" name="phone" >
  </div>
<input type="hidden" name="id" value="<?php echo $producto->id; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    $.post("./php/actualizarproducto.php",$("#actualizar").serialize(),function(data){
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