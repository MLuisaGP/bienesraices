<fieldset><!--//*Informacion General-->
                <legend>Informacion General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" placeholder="Titulo Propiedad" name="titulo" value = "<?php echo sanitizar($atributos['titulo']??"")?>" >

                <label for="precio">Precio:</label>
                <input type="number" id="precio" placeholder="Precio Propiedad" name="precio" value ="<?php echo sanitizar ($atributos['precio']??"");?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
                <!-- //*Se agrega la imagen pequeña si esta en actualizar -->
                <?php if($atributos['imagen']):?>
                    <img  class="imagen-small" src="/bienesraices/imagenes/<?php echo $atributos['imagen']?>">
                <?php endif; ?>

                <label for="descripcion">Descripción:</label>
                <textarea  id="descripcion" name="descripcion"><?php echo sanitizar($atributos['descripcion']??"");?></textarea>
            </fieldset><!--//?Informacion General-->

            <fieldset><!--//*Informacion Propiedad-->
                <legend>Informacion Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" placeholder="Ej:3" min="1" name="habitaciones" value = "<?php echo sanitizar($atributos['habitaciones']??"");?>" >

                <label for="wc">Baños:</label>
                <input type="number" id="wc" placeholder="Ej:3" min="1" name="wc" value = "<?php echo sanitizar($atributos['wc'])?>">

                <label for="estacionamiento">Estacionamientos:</label>
                <input type="number" id="estacionamiento" placeholder="Ej:3" min="1" name="estacionamiento" value = "<?php echo sanitizar($atributos['estacionamiento']);?>" >
            </fieldset><!--//?Informacion Propiedad-->

            <fieldset><!--//*Informacio Vendedor-->
                <legend>Vendedor</legend>

                <select name="id_vendedor" required >
                    <option <?php echo ($atributos['id_vendedor'] == null? 'selected': '');?> value="" disabled>-- Selecionar --</option>
                    <?php while($row = mysqli_fetch_assoc($resultado)): ?>
                        <option <?php echo ($atributos['id_vendedor'] === $row['id_vendedor']? 'selected': '');?> value="<?php echo ($row['id_vendedor'])?>""> <?php echo ($row['nombre_vendedor'].' '. $row['apellidos_vendedor'])?> </option>
                    <?php endwhile;?>
                </select>

            </fieldset><!--//?Informacion Vendedor-->