$(document).ready(function () {
    // Trigger the request to /get-codes after the page has loaded
    fetchData();

    // Handle change event on the client select
    $('#clientSelect').on('change', function () {
        // Trigger the request to /get-codes when the client is changed
        fetchData();
    });
});

function fetchData() {
    // Get the selected client ID
    var clientId = $('#clientSelect').val();

    // Use AJAX to fetch the codes for the selected client
    $.ajax({
        url: '/get-codes/' + clientId,
        type: 'GET',
        success: function (data) {
            // Clear and populate the code select options
            var codeSelect = $('#codeSelect');
            codeSelect.empty();

            // Add new options based on the fetched data
            $.each(data, function (key, value) {
                codeSelect.append('<option value="' + value.id + '">' + value.code + '</option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('Error fetching codes:', error);
        }
    });
}
