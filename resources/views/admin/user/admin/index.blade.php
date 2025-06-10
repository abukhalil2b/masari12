<x-app-layout>

    <div class="p-3 text-xl">
    الإداريين ({{ count($admins) }})
    </div>

    <link rel="stylesheet" href="/assets/datatable/css/dataTables.dataTables.css">

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>الصورة</th>
                <th>الفئة</th>
                <th>الرقم المدني</th>
                <th>الاسم</th>
                <th>الهاتف</th>
            </tr>
        </thead>
        <tbody>

            @foreach($admins as $admin)
            <tr>
                <td>
                    <a href="{{ route('admin.user.admin.show',$admin->id) }}" class="block">
                        <img src="{{  $admin->gender == 'male' ? asset('assets/images/avatar/avatar.png') : asset('assets/images/avatar/avatar-female.png')  }}" alt="" class="rounded-full w-8 h-8">
                    </a>
                </td>
                <td>
                    {{ __($admin->gender) }}
                </td>
                <td>
                    {{ $admin->civil_id }}
                </td>
                <td>
                    {{ $admin->name }}
                </td>
                <td>
                    {{ $admin->phone }}
                </td>
            </tr>
            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th>الصورة</th>
                <th>الفئة</th>
                <th>الرقم المدني</th>
                <th>الاسم</th>
                <th>الهاتف</th>
            </tr>
        </tfoot>
    </table>

    <script src="/assets/datatable/js/jquery-3.7.1.min.js"></script>
    <script src="/assets/datatable/js/dataTables.js"></script>
    <script>
        /* --  language --*/
        var language = {
            infoEmpty: "",
            infoFiltered: "",
            info: "",
            lengthMenu: 'عرض <select style="border-radius:5px;width:100px;">' +
                '<option value="50">50</option>' +
                '<option value="80">80</option>' +
                '<option value="100">100</option>' +
                '<option value="150">150</option>' +
                '<option value="-1">الكل</option>' +
                '</select>',
            zeroRecords: "لايوجد نتائج تتطابق بحثك",
            search: "",
            sSearchPlaceholder: "تصفية",
            paginate: {
                first: "الأول",
                previous: "السابق",
                next: "التالي",
                last: "الأخير"
            },
        };
        new DataTable('#example', {
            //   columnDefs: [
            //     {
            //         target: 2,
            //         visible: false,
            //         searchable: false,
            //     },
            //     {
            //         target: 3,
            //         visible: false,
            //     },
            // ],
            //   order: [[ 3, 'desc' ], [ 0, 'asc' ]],
            scrollX: true,
            pageLength: 100,
            //   paging: false,
            ordering: false,
            language: language,
        });
    </script>

</x-app-layout>