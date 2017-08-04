<?php 
include_once 'header.php';
?>
<section id="section_add_group">
<section class="section-update-user">
    <div class="title-content">
        <p>Crear nuevo grupo</p>
    </div>
    <div class="informationGroup">
        <p>Grado academico</p>
        <select name=""  class="form-control" id="gradeid">
            <option value="7">7°</option>
            <option value="8">8°</option>
            <option value="9">9°</option>
            <option value="10">10°</option>
            <option value="11">11°</option>
        </select>

        <p>Seccion</p>
        <input type="number" name="quantity" min="1" max="30" class="form-control" id="sectionId">
        <p>Materia</p>
        <select name="" class="form-control" id="subjectid">
            <option value="Estudios Sociales">Estudios Sociales</option>
            <option value="Matematica">Matematica</option>
            <option value="Educacion civica">Educacion civica</option>
            <option value="Espanol">Espanol</option>
            <option value="Quimica">Quimica</option>
            <option value="Educacion civica">Educacion civica</option>
            <option value="Biologia">Biologia</option>
            <option value="Educacion Fisica">Educacion Fisica</option>
            <option value="Educacion Religiosa">Educacion Religiosa</option>
        </select>
        <button type="button" class="btn btn-primary" id="insertGroupBtn">Crear</button>
        <p id="codeid"></p>
        <!--alerts-->
        <div class="alertUpdateUsercorrect">
            <div class="alert alert-success alert-dismissable ocultar" id="alertInsertGroupDiv">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p id="alertInsertGroup"></p>
            </div>
            <div class="alert alert-danger alert-dismissable ocultar" id="alertInsertGroupIncorrectDiv">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p id="alertInsertGroupIncorrect"></p>
            </div>
        </div>

    </div>
</section>
</section>
<?php
include_once 'footer.php';
?>