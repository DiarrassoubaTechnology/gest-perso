$(document).ready(function () {
    $('#selectService').on('change', function () {
        let serviceId = $(this).val();

        ListFunctionOccupe(serviceId);
    });

    $('#selectService').on('click', function () {
        let serviceId = $(this).val();

        ListFunctionOccupe(serviceId);
    });

    function ListFunctionOccupe(serviceId) {
        if (serviceId) {
            $.ajax({
                url: '/list.function',
                type: 'POST',
                data: {
                    service: serviceId,
                },
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                success: function (response) {
                    $('#selectFonction').empty();
                    $('#selectFonction').append('<option selected>...</option>');
                    response.forEach(function (fonction) {
                        $('#selectFonction').append('<option value="' + fonction.id + '">' + fonction.lib_function_occupied + '</option>');
                    });
                },
                error: function () {
                    alert('Erreur lors du chargement des fonctions.');
                }
            });
        } else {
            $('#selectFonction').empty();
            $('#selectFonction').append('<option selected>...</option>');
        }
    }
});