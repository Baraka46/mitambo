@extends('layouts.myjetlayout', ['subheading' => 'Add Packages'])

@section('content')

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-6 w-full max-w-lg text-center">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="mt-7 flex flex-col md:flex-row gap-6 w-full max-w-6xl mx-auto">
        <!-- Container for Textarea and Buttons -->
        <div class="flex flex-col gap-4 w-full max-w-lg flex-shrink-0">
            <!-- Textarea -->
            <textarea id="tableData" rows="10" class="border border-gray-300 rounded p-2 w-full" placeholder="Paste your tab-separated data here..."></textarea>
            
            <!-- Buttons -->
            <div class="flex gap-4">
                <button id="insertTabButton" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Insert Tab</button>
                <button id="clearButton" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Clear</button>
                <button id="updateFormButton" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Update Form</button>
            </div>
        </div>
        
        <!-- Form -->
        <form action="{{ route('officer.store') }}" method="POST" id="tableForm" class="w-full bg-white shadow-lg rounded-lg p-6 flex-1">
            @csrf
            <div id="dynamicForm" class="grid grid-cols-2 gap-4"></div>
            <button type="submit" id="submitButton" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 w-full mt-4 hidden">Submit</button>
        </form>
    </div>
    
    <iframe class="my-9" src="https://silentoceanlimited.co.tz/" width="93%" height="500px" frameborder="0" allowfullscreen></iframe>

    <script>
        function generateForm(clipboardData) {
            var rows = clipboardData.split('\n');
            var columns = rows[0].split('\t'); // Get the column names from the first row
            
            var columnNames = ['customer_name', 'shipping_number', 's', 'm', 'contact']; // Custom column names
            
            // Limit the number of columns to match the number of custom column names
            columns = columns.slice(0, columnNames.length);
            
            // Set grid columns to 2 columns layout
            document.getElementById('dynamicForm').style.gridTemplateColumns = 'repeat(2, 1fr)'; 

            var dynamicFormHtml = '';
            columns.forEach(function(col, colIndex) {
                var columnName = columnNames[colIndex] || 'column' + colIndex;
                dynamicFormHtml += '<div class="flex flex-col">';
                dynamicFormHtml += '<label for="' + columnName + '" class="text-sm font-medium text-gray-700 mb-1 capitalize">' + columnName.replace('_', ' ') + '</label>';
                dynamicFormHtml += '<input type="text" id="' + columnName + '" name="' + columnName + '" value="' + col + '" class="border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500">';
                dynamicFormHtml += '</div>';
            });
            document.getElementById('dynamicForm').innerHTML = dynamicFormHtml;

            // Show the submit button
            document.getElementById('submitButton').classList.remove('hidden');
        }

        document.getElementById('tableData').addEventListener('paste', function(e) {
            e.preventDefault();
            var clipboardData = (e.clipboardData || window.clipboardData).getData('text');
            generateForm(clipboardData);
            document.getElementById('tableData').value = clipboardData;
        });

        document.getElementById('updateFormButton').addEventListener('click', function() {
            var manualData = document.getElementById('tableData').value;
            generateForm(manualData);
        });

        document.getElementById('insertTabButton').addEventListener('click', function() {
            var textarea = document.getElementById('tableData');
            var start = textarea.selectionStart;
            var end = textarea.selectionEnd;

            // Insert a tab character at the cursor position
            textarea.value = textarea.value.substring(0, start) + '\t' + textarea.value.substring(end);

            // Move the cursor position
            textarea.selectionStart = textarea.selectionEnd = start + 1;

            // Focus the textarea
            textarea.focus();
        });

        document.getElementById('clearButton').addEventListener('click', function() {
            document.getElementById('tableData').value = '';
            document.getElementById('dynamicForm').innerHTML = '';
            document.getElementById('submitButton').classList.add('hidden');
        });

        document.getElementById('tableData').addEventListener('keydown', function(e) {
            if (e.key === 'Tab') {
                e.preventDefault();
                // Get the current position of the cursor
                var start = this.selectionStart;
                var end = this.selectionEnd;

                // Insert a tab character at the cursor position
                this.value = this.value.substring(0, start) + '\t' + this.value.substring(end);

                // Move the cursor position
                this.selectionStart = this.selectionEnd = start + 1;
            }
        });
    </script>

@endsection
