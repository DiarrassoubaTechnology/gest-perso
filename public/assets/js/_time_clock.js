$(document).ready(function () {
    function afficherDateHeure() {
        var date = new Date();
        
        // Tableau des jours de la semaine
        var jours = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
        
        // Tableau des mois de l'année
        var mois = ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"];
        
        // Récupère le jour, mois et année
        var jourSemaine = jours[date.getDay()];  // GetDay retourne un nombre (0 pour dimanche, 1 pour lundi, etc.)
        var jour = date.getDate().toString().padStart(2, '0'); // Assure que le jour a deux chiffres
        var moisAffiche = mois[date.getMonth()];  // GetMonth retourne un nombre de 0 à 11
        var annee = date.getFullYear();  // Récupère l'année
        
        // Format de la date au format souhaité "jourSemaine jour mois année"
        var dateFormattee = jourSemaine + " " + jour + " " + moisAffiche + " " + annee;
        
        // Affichage dans l'élément avec l'ID 'date'
        var datelement = document.getElementById('date');
        if (datelement) {
            datelement.innerText = dateFormattee;
        }

        // Format de l'heure (HH:MM:SS)
        var heures = date.getHours().toString().padStart(2, '0');
        var minutes = date.getMinutes().toString().padStart(2, '0');
        var secondes = date.getSeconds().toString().padStart(2, '0');
        
        // Format complet de l'heure
        var heureFormattee = heures + ':' + minutes + ':' + secondes;

        // Affichage dans l'élément avec l'ID 'heure'
        var heureElement = document.getElementById('heure');
        if (heureElement) {
            heureElement.innerText = heureFormattee;
        }

        // Vérifiez si l'élément avec l'ID 'heureModal' existe
        var heureModalElement = document.getElementById('heureModal');
        if (heureModalElement) {
            heureModalElement.innerText = heureFormattee;
        }
    }

    // Met à jour la date et l'heure toutes les secondes
    setInterval(afficherDateHeure, 1000);

    // Initialisation de la date et de l'heure au chargement de la page
    afficherDateHeure;

    
    $('#btnClockForm').on('click', function (event) {

        // Désactiver le bouton
        $('#btnClockForm').prop('disabled', true);

        // Afficher le spinner et masquer le texte "Enregistrer"
        $('#loadingSpinnerClock').show(); // Affiche le spinner

        navigator.geolocation.getCurrentPosition(function(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            
            // Empêche l'envoi du formulaire par défaut
            event.preventDefault();
            
            $.ajax({
                url: '/time/point',
                type: 'POST',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content') },
                data: {latitude: latitude, longitude: longitude},
                success: function(response) {
                    // Traitez la réponse en cas de succès
                    if(response.success){
                        Swal.fire(
                        {
                            title: "Succès!!!",
                            text: response.message,
                            icon: 'success',
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

                    if(response.error){
                        Swal.fire(
                            {
                                title: "Attention!!!",
                                text: response.error,
                                icon: 'warning',
                                confirmButtonText: 'OK'
                            }
                        );
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
                    $('#btnClockForm').prop('disabled', false);
                    $('#loadingSpinnerClock').hide(); // Masquer le spinner
                }
            });

        }, function(error) {
            // Réactiver le bouton et restaurer le texte et masquer le spinner
            $('#btnClockForm').prop('disabled', false);
            $('#loadingSpinnerClock').hide(); // Masquer le spinner
            
            // Gérer les erreurs de géolocalisation
            Swal.fire(
                {
                    title: "Erreur!!!",
                    text: "Erreur de géolocalisation : " + error.message,
                    icon: 'danger',
                    confirmButtonText: 'OK'
                }
                ).then((result) => {
                    if (result.isConfirmed) {
                        // Action à effectuer si l'utilisateur click
                        window.location.reload (); // Recharge la page
                    }
                });
                return false;
        });

    });

    $('#outTime').on('click', function (event) {

        // Désactiver le bouton
        $('#outTime').prop('disabled', true);

        // Afficher le spinner et masquer le texte "Enregistrer"
        $('#loadingSpinnerOutTime').show(); // Affiche le spinner

        // Empêche l'envoi du formulaire par défaut
        event.preventDefault();
        
        $.ajax({
            url: '/time/endday',
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content') },
            success: function(response) {
                // Traitez la réponse en cas de succès
                if(response.success){
                    Swal.fire(
                    {
                        title: "Succès!!!",
                        text: response.success,
                        icon: 'success',
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

                if(response.error){
                    Swal.fire(
                        {
                            title: "Attention!!!",
                            text: response.error,
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        }
                    );
                    return false;
                }
            },
            error: function(xhr, status, error) {
                // Traitez les erreurs en cas d'échec
                //  Affichez l'erreur dans la console pour le débogage
                console.error(xhr.responseText);
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
                $('#outTime').prop('disabled', false);
                $('#loadingSpinnerOutTime').hide(); // Masquer le spinner
            }
        });

    });


    function getLocation() { 
        if (navigator.geolocation) { 
            navigator.geolocation.getCurrentPosition(showPosition, showError); 
        } else { 
            alert("La géolocalisation n'est pas prise en charge par ce navigateur."); 
        } 
    } 
    
    function showPosition(position) { 
        document.getElementById('latitude').value = position.coords.latitude; 
        document.getElementById('longitude').value = position.coords.longitude; 
    } 
    
    function showError(error) { 
        switch(error.code) { 
            case error.PERMISSION_DENIED: alert("L'utilisateur a refusé la demande de géolocalisation."); 
            break;
            
            case error.POSITION_UNAVAILABLE: alert("Les informations de localisation sont indisponibles.");
            break;
            
            case error.TIMEOUT: alert("La demande de localisation a expiré.");
            break; 
            
            case error.UNKNOWN_ERROR: alert("Une erreur inconnue est survenue.");
            break;
        } 
    }

});