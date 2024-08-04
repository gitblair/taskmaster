<script>
    $(document).ready(function() {
        // Handle Customize View button click
        $('#customize-view-btn').on('click', function() {
            // Hide all columns first
            $('#series-table th, #series-table td').hide();

            // Show columns based on selected checkboxes
            $('#customize-view-form input:checked').each(function() {
                var columnClass = '.column-' + $(this).val();
                $('#series-table th' + columnClass + ', #series-table td' + columnClass).show();
            });
        });

        // Add other existing scripts here
    });
</script>
