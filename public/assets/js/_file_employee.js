$(document).ready(function () {
    $('#btnEmployeeForm').on('click', function (event) {

        // Empêche l'envoi du formulaire par défaut
        event.preventDefault();

        // Initialisation de la variable qui vérifiera si tout est valide
        let isValid = true;

        // Vérification des champs requis
        $('#editEmployeeForm [required]').each(function () {
            if ($(this).val() === "") {
                $(this).addClass('is-invalid'); // Ajoute la classe 'is-invalid' pour afficher un style d'erreur
                isValid = false;
            } else {
                $(this).removeClass('is-invalid'); // Retire la classe d'erreur si la valeur est remplie
            }
        });

        // Si tout est valide, on envoie les données par AJAX
        if (isValid) {
            
            // Désactiver le bouton
            $('#btnEmployeeForm').prop('disabled', true);

            // Afficher le spinner et masquer le texte "Enregistrer"
            $('#loadingSpinner').show(); // Affiche le spinner

            let formData = $('#editEmployeeForm').serialize();
            
            $.ajax({
                url: '/employee/edit',
                type: 'POST',
                data: formData,
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                success: function(response) {
                    // Traitez la réponse en cas de succès
                    if(response.message){
                        Swal.fire(
                        {
                            title: "Success!!!",
                            text: response.message,
                            icon: response.status,
                            confirmButtonText: 'OK'
                        }
                        ).then((result) => {
                            if (result.isConfirmed) {
                                // Action à effectuer si l'utilisateur click
                                window.location.reload (); // Recharge la page
                            }
                        });
                        return false;
                    }
                },
                error: function(xhr, status, error) {
                    // Traitez les erreurs en cas d'échec
                    //console.error(xhr.responseText);  Affichez l'erreur dans la console pour le débogage
                    Swal.fire(
                        {
                            title: "Erreur!!!",
                            text: xhr.responseText.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }
                    );
                    return false;
                },
                complete: function() {
                    // Réactiver le bouton et restaurer le texte et masquer le spinner
                    $('#btnEmployeeForm').prop('disabled', false);
                    $('#loadingSpinner').hide(); // Masquer le spinner
                    $('#btnEmployeeForm').text('Enregistrer'); // Restaurez le texte du bouton
                }
            });
        

        } else {
            // Si des champs sont manquants, afficher un message d'erreur
            Swal.fire(
            {
                title: "Attention!!!",
                text: "Veuillez remplir tous les champs requis.",
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        }

    });

    $('#saveEmployeeBtn').on('click', function (event) {

        // Empêche l'envoi du formulaire par défaut
        event.preventDefault();

        // Initialisation de la variable qui vérifiera si tout est valide
        let isValid = true;

        // Vérification des champs requis
        $('#saveEmployeeForm [required]').each(function () {
            // Vérifier si c'est un champ input
            if ($(this).is('input') && $(this).val() === "") {
                $(this).addClass('is-invalid'); // Ajoute la classe 'is-invalid' pour afficher un style d'erreur
                isValid = false;
            }

            // Vérifier si c'est un select
            else if ($(this).is('select') && $(this).val() === "" || $(this).val() === null || $(this).val() === "...") {
                $(this).addClass('is-invalid'); // Ajoute la classe 'is-invalid' pour afficher un style d'erreur
                isValid = false;
            } else {
                $(this).removeClass('is-invalid'); // Retire la classe d'erreur si la valeur est remplie
            }
        });

        // Si tout est valide, on envoie les données par AJAX
        if (isValid) {

            
            // Désactiver le bouton
            $('#saveEmployeeBtn').prop('disabled', true);

            // Afficher le spinner
            $('#loadingSpinnerSave').show(); // Affiche le spinner

            let formData = $('#saveEmployeeForm').serialize();
            
            $.ajax({
                url: '/employee/save',
                type: 'POST',
                data: formData,
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                success: function(response) {
                    // Traitez la réponse en cas de succès
                    if(response.message){
                        Swal.fire(
                        {
                            title: "Success!!!",
                            text: response.message,
                            icon: response.status,
                            confirmButtonText: 'Voir la liste'
                        }
                        ).then((result) => {
                            if (result.isConfirmed) {
                                // Action à effectuer si l'utilisateur click
                                window.location.href = "/employee/liste"; // Recharge la page
                            }
                        });
                        return false;
                    }
                },
                error: function(error) {
                    // Traitez les erreurs en cas d'échec
                    //console.error(xhr.responseText);  Affichez l'erreur dans la console pour le débogage

                    // Essayez d'accéder correctement à l'objet d'erreur
                    var errorMessage = '';

                    try {
                        var response = JSON.parse(error.responseText); // Si la réponse est au format JSON
                        if (response.errors && response.errors.contact) {
                            errorMessage = response.errors.contact[0]; // Le message d'erreur se trouve dans le tableau sous "contact"
                        } else {
                            errorMessage = 'Une erreur est survenue. Veuillez réessayer.'; // Message générique si le format est inattendu
                        }
                    } catch (e) {
                        errorMessage = 'Erreur de traitement de la réponse.'; // Message d'erreur si JSON.parse échoue
                    }

                    Swal.fire({
                        title: "Erreur!!!",
                        text: errorMessage,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });

                    return false;
                },
                complete: function() {
                    // Réactiver le bouton et restaurer le texte et masquer le spinner
                    $('#saveEmployeeBtn').prop('disabled', false);
                    $('#loadingSpinnerSave').hide(); // Masquer le spinner
                }
            });

        } else {
            // Si des champs sont manquants, afficher un message d'erreur
            Swal.fire(
            {
                title: "Attention!!!",
                text: "Veuillez remplir tous les champs requis.",
                icon: 'warning',
                confirmButtonText: 'Ok'
            });
        }
    });

    $('#deleteEmployeeBtn').on('click', function () {
        
        // Désactiver le bouton
        $('#deleteEmployeeBtn').prop('disabled', true);

        // Afficher le spinner et masquer le texte "Enregistrer"
        $('#loadingSpinnerDelete').show(); // Affiche le spinner

        var formData = $('#deleteEmployeeForm').serialize();
        
        $.ajax({
            url: '/employee/delete',
            type: 'POST',
            data: formData,
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
            success: function(response) {
                // Traitez la réponse en cas de succès
                if(response.message){
                    Swal.fire(
                        {
                            title: "Success!!!",
                            text: response.message,
                            icon: response.status,
                            confirmButtonText: 'OK'
                        }
                    ).then((result) => {
                        if (result.isConfirmed) {
                            // Action à effectuer si l'utilisateur click
                            window.location.reload (); // Recharge la page
                        }
                    });
                    return false;
                }
            },
            error: function(xhr, status, error) {
                // Traitez les erreurs en cas d'échec
                //console.error(xhr.responseText);  Affichez l'erreur dans la console pour le débogage
                Swal.fire(
                    {
                        title: "Erreur!!!",
                        text: xhr.responseText.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }
                  );
                  return false;
            },
            complete: function() {
                // Réactiver le bouton et restaurer le texte et masquer le spinner
                $('#deleteEmployeeBtn').prop('disabled', false);
                $('#loadingSpinnerDelete').hide(); // Masquer le spinner
            }
        });

    });

    $('#enableBtnEmployee').on('click', function () {
        
        // Désactiver le bouton
        $('#enableBtnEmployee').prop('disabled', true);

        // Afficher le spinner et masquer le texte "Enregistrer"
        $('#loadingSpinnerEnable').show(); // Affiche le spinner

        var formData = $('#enableFormEmployee').serialize();
        
        $.ajax({
            url: '/employee/enable',
            type: 'POST',
            data: formData,
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
            success: function(response) {
                // Traitez la réponse en cas de succès
                if(response.message){
                    Swal.fire(
                        {
                            title: "Success!!!",
                            text: response.message,
                            icon: response.status,
                            confirmButtonText: 'OK'
                        }
                    ).then((result) => {
                        if (result.isConfirmed) {
                            // Action à effectuer si l'utilisateur click
                            window.location.reload (); // Recharge la page
                        }
                    });
                    return false;
                }
            },
            error: function(xhr, status, error) {
                // Traitez les erreurs en cas d'échec
                //console.error(xhr.responseText);  Affichez l'erreur dans la console pour le débogage
                Swal.fire(
                    {
                        title: "Erreur!!!",
                        text: xhr.responseText.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }
                  );
                  return false;
            },
            complete: function() {
                // Réactiver le bouton et restaurer le texte et masquer le spinner
                $('#enableBtnEmployee').prop('disabled', false);
                $('#loadingSpinnerEnable').hide(); // Masquer le spinner
            }
        });

    });

    $('#btnEmployeeKey').on('click', function () {
        
        // Désactiver le bouton
        $('#btnEmployeeKey').prop('disabled', true);

        // Afficher le spinner et masquer le texte "Enregistrer"
        $('#loadingSpinnerKey').show(); // Affiche le spinner

        var formData = $('#formEmployeeKey').serialize();
        
        $.ajax({
            url: '/employee/key',
            type: 'POST',
            data: formData,
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
            success: function(response) {
                // Traitez la réponse en cas de succès
                if(response.message){
                    Swal.fire(
                        {
                            title: "Success!!!",
                            text: response.message,
                            icon: response.status,
                            confirmButtonText: 'OK'
                        }
                    ).then((result) => {
                        if (result.isConfirmed) {
                            // Action à effectuer si l'utilisateur click
                            window.location.reload (); // Recharge la page
                        }
                    });
                    return false;
                }
            },
            error: function(xhr, status, error) {
                // Traitez les erreurs en cas d'échec
                //console.error(xhr.responseText);  Affichez l'erreur dans la console pour le débogage
                Swal.fire(
                    {
                        title: "Erreur!!!",
                        text: xhr.responseText.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }
                  );
                  return false;
            },
            complete: function() {
                // Réactiver le bouton et restaurer le texte et masquer le spinner
                $('#btnEmployeeKey').prop('disabled', false);
                $('#loadingSpinnerKey').hide(); // Masquer le spinner
            }
        });

    });
});