<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Godown, Sections, and Rows</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function addSection() {
            const sectionTemplate = document.getElementById('section-template');
            const sectionsContainer = document.getElementById('sections-container');
            sectionsContainer.appendChild(sectionTemplate.content.cloneNode(true));
        }

        function addRow(sectionElement) {
            const rowTemplate = document.getElementById('row-template');
            const rowsContainer = sectionElement.querySelector('.rows-container');
            rowsContainer.appendChild(rowTemplate.content.cloneNode(true));
        }

        document.addEventListener('click', function(event) {
            if (event.target.matches('.add-section')) {
                addSection();
            }
            if (event.target.matches('.add-row')) {
                const sectionElement = event.target.closest('.section');
                addRow(sectionElement);
            }
        });
    </script>
</head>
<body>
    <div class="min-h-screen bg-gray-100 flex flex-col">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Add Godown, Sections, and Rows
                </h2>
            </div>
        </header>
        <main class="flex-grow">
            <div class="py-3">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white p-8 shadow-lg rounded-lg">
                        <form method="POST" action="{{ route('new.godown_section_row.store') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="godown" class="block text-sm font-medium text-gray-700">Godown</label>
                                <input type="text" id="godown" name="name" placeholder="Godown" class="mt-1 block w-full px-3 py-2 rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                            </div>

                            <div id="sections-container"></div>
                            <button type="button" class="add-section bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors mb-4">Add Section</button>

                            <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors">Submit</button>
                        </form>

                        <template id="section-template">
                            <div class="section mb-4 border p-4 rounded-lg bg-gray-50">
                                <label class="block text-sm font-medium text-gray-700">Section</label>
                                <input type="text" name="sections[][name]" placeholder="Section Name" class="mt-1 block w-full px-3 py-2 rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                <div class="rows-container flex space-x-2 mt-2"></div>
                                <button type="button" class="add-row bg-indigo-500 text-white py-1 px-2 rounded-lg hover:bg-indigo-600 transition-colors mt-2">Add Row</button>
                            </div>
                        </template>

                        <template id="row-template">
                            <div class="row">
                                <input type="text" name="sections[][rows][]" placeholder="Row Name" class="mt-1 block w-full px-3 py-2 rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
