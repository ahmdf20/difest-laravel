<x-dashboard-layout>
    <div class="bg-neutral p-3 rounded-lg max-w-5xl mx-auto mt-5 text-neutral-100">
        <h1 class="text-3xl mb-4">Tabel Participant</h1>
        <hr class="py-4">
        <div class="overflow-x-auto">
            <table
                class="table"
                id="example"
            >
                <!-- head -->
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Job</th>
                        <th>Favorite Color</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr>
                        <th>1</th>
                        <td>Cy Ganderton</td>
                        <td>Quality Control Specialist</td>
                        <td>Blue</td>
                    </tr>
                    <!-- row 2 -->
                    <tr class="hover">
                        <th>2</th>
                        <td>Hart Hagerty</td>
                        <td>Desktop Support Technician</td>
                        <td>Purple</td>
                    </tr>
                    <!-- row 3 -->
                    <tr>
                        <th>3</th>
                        <td>Brice Swyre</td>
                        <td>Tax Accountant</td>
                        <td>Red</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $('#example').DataTable()
    </script>

    @if (Session::get('message'))
    <script>
        Swal.fire({
            title: `{{ Session::get('title') }}`,
            text: `{{ Session::get('message') }}`,
            icon: `{{ Session::get('icon') }}`
        })
    </script>
    @endif
</x-dashboard-layout>