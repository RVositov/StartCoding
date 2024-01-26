        $(document).ready(function() {
        $('.select2').select2()
        });

    $(document).ready(function () {
    // Function to fetch and populate schools based on the selected city
    function fetchSchools(cityId) {
        $.ajax({
            url: '/getSchoolsByCity/' + cityId,
            type: 'GET',
            success: function (data) {
                var schoolSelect = $('#schoolSelect');
                schoolSelect.empty();

                $.each(data, function (key, value) {
                    schoolSelect.append('<option value="' + value.id + '">' + value.name + '</option>');
                });
            },
            error: function (xhr, status, error) {
                console.error('Error fetching schools:', error);
            }
        });
    }

    // Trigger the fetchSchools function on page load with the default selected city
    var defaultCityId = $('#citySelect').val();
    fetchSchools(defaultCityId);

    // Bind the change event to update schools when a different city is selected
    $('#citySelect').on('change', function () {
    var selectedCityId = $(this).val();
    fetchSchools(selectedCityId);
});
});
