@extends('templete.navbar')
@section('title', 'SATUAN PENDIDIKAN MUADALAH | Pondok Pesantren Rafah')
@section('konten')
<section class="py-12 px-4 bg-white">
    <div class="max-w-6xl mx-auto space-y-10">

        <!-- Judul -->
        <div class="text-center px-4" data-aos="zoom-in" data-aos-duration="800">
            <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800 border-b-2 border-green-600 inline-block pb-1">
                SATUAN PENDIDIKAN MU’ADALAH
            </h2>
        </div>

        <!-- Paragraf -->
        <div class="text-gray-700 text-sm sm:text-base px-4 md:px-0 text-justify leading-relaxed space-y-4" data-aos="fade-up" data-aos-duration="1000">
            <p>
                Satuan Pendidikan Mu’adalah adalah program pendidikan resmi yang berada di bawah Direktorat
                Pendidikan Diniyyah dan Pesantren. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took
                a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                but also the leap into electronic typesetting, remaining essentially unchanged.
                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </div>

        <!-- Tabel Dinamis -->
        <div class="w-full overflow-x-auto px-4 md:px-0" data-aos="fade-up" data-aos-duration="1200">
            <table class="w-full text-xs sm:text-sm text-gray-700 border border-gray-300 table-auto shadow-md rounded">
                <thead class="bg-gray-100 border-b text-center">
                    <tr>
                        <th rowspan="2" class="p-3 align-middle whitespace-nowrap border">STUDI SYAR'I</th>
                        <th colspan="2" class="p-3 whitespace-nowrap border">STUDI BAHASA</th>
                        <th rowspan="2" class="p-3 align-middle whitespace-nowrap border">STUDI KAUNI</th>
                    </tr>
                    <tr class="bg-gray-50">
                        <th class="p-3 whitespace-nowrap border">Bahasa Arab</th>
                        <th class="p-3 whitespace-nowrap border">Bahasa Inggris</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $columns = [
                            'studi_syari' => [],
                            'bahasa_arab' => [],
                            'bahasa_inggris' => [],
                            'studi_kauni' => [],
                        ];

                        foreach ($data as $item) {
                            if ($item->studi_syari) $columns['studi_syari'][] = $item->studi_syari;
                            if ($item->bahasa_arab) $columns['bahasa_arab'][] = $item->bahasa_arab;
                            if ($item->bahasa_inggris) $columns['bahasa_inggris'][] = $item->bahasa_inggris;
                            if ($item->studi_kauni) $columns['studi_kauni'][] = $item->studi_kauni;
                        }

                        $totalBaris = max(array_map('count', $columns));
                    @endphp

                    @for ($i = 0; $i < $totalBaris; $i++)
                        <tr class="border-b hover:bg-gray-50 text-center">
                            <td class="p-3 border whitespace-nowrap">{{ $columns['studi_syari'][$i] ?? '' }}</td>
                            <td class="p-3 border whitespace-nowrap">{{ $columns['bahasa_arab'][$i] ?? '' }}</td>
                            <td class="p-3 border whitespace-nowrap">{{ $columns['bahasa_inggris'][$i] ?? '' }}</td>
                            <td class="p-3 border whitespace-nowrap">{{ $columns['studi_kauni'][$i] ?? '' }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>

    </div>
</section>
@endsection
