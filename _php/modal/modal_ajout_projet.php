<?php require_once("../inc/init.php");
$func = new Functions(); ?>

<!-- Titre du modal -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Ajout d'un projet</h4>
</div>

<!-- Début du formulaire -->
<form action="./php/iAjout_projet.php" id="ajoutProjet" class="smart-form" novalidate="novalidate"
      method="post" name="ajoutSociete">

    <div class="modal-body col-12">

        <fieldset>

            <!-- Societe -->
            <div class="row">
                <label class="label col col-2">Société</label>
                <section class="col col-3">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="projet_societe" id="select_entreprise" required>
                            <option value="" disabled selected>Choisir une société</option>
                            <?php
                            $select = $pdo->sql("select societes_id, societes_nom from societes group by societes_nom");
                            while ($row = $select->fetch()) {
                                echo "<option " . $selected . " value=" . $row['societes_id'] . ">" . $row['societes_nom'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-briefcase" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>

            <!-- Type projet -->
            <div class="row">
                <label class="label col col-2">Type de projet</label>
                <section class="col col-3">
                    <div class="icon-addon" style="width: 122%;">
                        <select class="form-control" name="projet_type" id="select_local" required>
                            <option value="" selected="" disabled="">Choisir un type de projet</option>
                            <?php

                            $select = $pdo->sql("select projets_types_id, projets_types_nom from projets_types GROUP BY projets_types_nom");
                            while ($row = $select->fetch()) {
                                echo "<option " . $selected . " value=" . $row['projets_types_id'] . ">" . $row['projets_types_nom'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title=""
                               data-original-title="email"></label>
                    </div>
                </section>
            </div>

            <!-- Nom projet -->
            <div class="row">
                <label class="label col col-2">Nom projet</label>
                <section class="col col-4">
                    <label class="input"> <i class="icon-prepend fa fa-cogs"></i>
                        <input type="text" name="projet_nom" placeholder="Nom du projet"
                               required">
                    </label>
                </section>


                <!-- Description projet -->

                <label class="label col col-2">Description</label>
                <section class="col col-4">
                    <label class="input fe"><i class="icon-prepend fa fa-cogs"></i>
                        <input type="text" name="projet_description" placeholder="Description du projet" required">
                    </label>
                </section>
            </div>


        <div class="row">
            <label class="label col col-2">URL du projet</label>
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="projet_url" placeholder="Liens vers le projet" required">
                </label>
            </section>

            <label class="label col col-2">Date de début</label>
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                    <input type="text" class="form-control datepicker" name="projet_dateDebut"
                           id="utilisateur_embauche"
                           placeholder="Date de début du projet">
                </label>
            </section>
        </div>
        </fieldset>
        <!-- NOUVEAU FIELDSET -->
        <fieldset>
            <div class="row">
                <label class="label col col-2">Commentaire</label>
                <section class="col col-10">
                    <label class="textarea">
                                <textarea rows="5" name="projet_commentaire" placeholder="Commentaire"
                                          required></textarea>
                    </label>
                </section>
            </div>
        </fieldset>

        <footer>
            <button type="submit" class="btn btn-primary">Ajouter !</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        </footer>

    </div>
</form>
<!-- Fin formulaire -->


<!-- SCRIPTS ON PAGE EVENT -->
<script type="text/javascript" src="<?php echo ASSETS_URL; ?>/js/plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript">

    pageSetUp();

    // PAGE RELATED SCRIPTS

    // pagefunction

    var pagefunction = function () {

        tinymce.init({
            selector: 'textarea',
            height: 140,
            menu: {
            },
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code',
                'textcolor',
                'table'
            ],
            toolbar: 'insertfile undo redo | styleselect | forecolor backcolor bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | table',
            content_css: [
                '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
                '//www.tinymce.com/css/codepen.min.css'
            ]
        });


        var $checkoutForm = $('#ajoutProjet').validate({
            // Rules for form validation
            rules: {
                nom_entreprise: {
                    required: true
                },
                id_local: {
                    required: true
                },
                utilisateur_service: {
                    required: true
                },
                utilisateur_nom: {
                    required: true
                },
                utilisateur_prenom: {
                    required: true
                },
                utilisateur_telephoneFixe: {
                    required: true,
                    digits: true
                },
                utilisateur_telephoneMobile: {
                    required: true,
                    digits: true
                },
                utilisateur_email: {
                    required: true,
                    email: true
                },
                utilisateur_fonction: {
                    required: true
                },
                utilisateur_statut: {
                    required: true
                },
                utilisateur_commentaire: {
                    required: true
                }
            },

            // Messages for form validation
            messages: {
                nom_entreprise: {
                    required: "Veuillez sélectionner une entreprise."
                },
                id_local: {
                    required: "Veuillez sélectionner un local."
                },
                utilisateur_service: {
                    required: "Veuillez renseigner un service."
                },
                utilisateur_nom: {
                    required: "Veuillez renseigner un nom."
                },
                utilisateur_prenom: {
                    required: "Veuillez renseigner un prénom."
                },
                utilisateur_telephoneFixe: {
                    required: "Veuillez renseigner un téléphone fixe."
                },
                utilisateur_telephoneMobile: {
                    required: "Veuillez renseigner un téléphone mobile."
                },
                utilisateur_email: {
                    required: "Veuillez renseigner un email.",
                    email: "Veuillez renseigner un email correct"
                },
                utilisateur_fonction: {
                    required: "Veuillez renseigner une fonction."
                },
                utilisateur_statut: {
                    required: "Veuillez renseigner un statut."
                },
                utilisateur_commentaire: {
                    required: "Veuillez renseigner un commentaire."
                }

            },

            submitHandler: function (ev) {
                $(ev).ajaxSubmit({
                    type: $('#ajoutProjet').attr('method'),
                    url: $('#ajoutProjet').attr('action'),
                    data: $('#ajoutProjet').serialize(),
                    dataType: 'json',
                    success: function (data) {
                        if (data.retour == '1') {
                            smallBox('Ajout impossible', 'Un utilisateur utilise déjà cet email.', 'warning');
                        }
                        else {
                            smallBox('Ajout effectué', 'Utilisateur correctement ajouté.', 'success');
                            setTimeout(function() {
                                $('#datatable_tabletools').DataTable().ajax.reload(null, false);
                            }, 500);
                        }
                        console.log(data.retour);
                    }
                });
            },

            // Do not change code below
            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            },

            invalidHandler: function () {
                smallBox('Ajout impossible', "Veuillez vérifier les champs.", 'error', '5000')
            }
        });


        // START AND FINISH DATE
        $('#startdate').datepicker({
            dateFormat: 'dd.mm.yy',
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            onSelect: function (selectedDate) {
                $('#finishdate').datepicker('option', 'minDate', selectedDate);
            }
        });

        $('#finishdate').datepicker({
            dateFormat: 'dd.mm.yy',
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            onSelect: function (selectedDate) {
                $('#startdate').datepicker('option', 'maxDate', selectedDate);
            }
        });
    };

    loadScript("js/plugin/jquery-form/jquery-form.min.js", pagefunction);

</script>