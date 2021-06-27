'<div class="form-row software-box"> 
    <div class="form-row"> 
        <div class="name">Nombre</div> <div class="value"><input type="hidden" name="index" value="' + softwareIndex + '"><div class="input-group"> <input class="input--style-5" type="text" name="proyecto-software-nombre-' + softwareIndex + '"> </div> </div> </div> 
        <div class="form-row"> <div class="name">Versión</div> <div class="value"> <div class="input-group"> <input class="input--style-5" type="text" name="proyecto-software-version-' + softwareIndex + '"> </div> </div> </div> 
        
        
        <div class="form-row"> 
            <div class="name">Tipo de Software</div> 

        <div class="value"> 
            <div class="input-group"> 
            <div class="rs-select2 js-select-simple select--no-search"> 
                <select name="proyecto-software-tipo-' + softwareIndex + '"> 
                    <option disabled="disabled" selected="selected" value="0">Selecciona una opción</option> 
                    <option value="1">Libre</option> 
                    <option value="2">Comercial</option> 
                </select> 
                <div class="select-dropdown"></div> 
            </div> </div> </div> </div>
            <div class="form-row"> 
                <div class="name">Cargar licencia de uso</div> 
                <input type="file" name="proyecto-software-licencia-' + softwareIndex + '" style="width: 0px;">
                 <button class="btn btn--radius-2 btn--red" onclick="cargarLicenciaPDF(this); event.preventDefault();">Cargar</button> 
                </div><div class="form-row"> <div class="name">Sitio web</div> 
                <div class="value"> <div class="input-group"> 
                    <input class="input--style-5" type="text" name="proyecto-software-link-' + softwareIndex + '"> </div> 
                </div> </div> </div>';




                <div class="form-row"><div class="name">Tipo de licencia </div><div class="value"><div class="input-group"><div class="rs-select2 js-select-simple select--no-search"><select name="proyecto-area"  onchange="pideLicencia(this)"><option disabled="disabled" selected="selected">Escoge una opción</option><option value="0">No comercial</option> </select><div class="select-dropdown"></div></div></div></div></div>