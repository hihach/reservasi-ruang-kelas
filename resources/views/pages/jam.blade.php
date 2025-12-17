@extends('layouts.app')

@section('content')
    <div class="p-6">
        {{-- Header --}}
        <div class="flex justify-between items-center mx-4 md:mx-8">
            <h1 class="text-xl font-semibold">Reservasi {{ $kelas->nama_kelas }} ({{ $kelas->lantai->nama_lantai }})</h1>

            {{-- Form Ganti Tanggal --}}

            <form action="{{ route('reservasi.create') }}" method="GET">
                <input type="hidden" name="class_id" value="{{ $kelas->id }}">

                <input type="date" name="date" value="{{ $tanggal }}"
                    class="border rounded-md p-2 text-sm cursor-pointer" onchange="this.form.submit()">
            </form>
        </div>

        {{-- Jam Grid --}}
        <div id="jamContainer" class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 gap-6 mt-10 mx-4 md:mx-8"></div>

        {{-- Summary Box --}}
        <div id="summaryBox"
            class="mt-10 mx-4 md:mx-8 bg-white rounded-xl shadow-md p-6 hidden opacity-0 transition-opacity duration-300 border border-gray-100">

            <h3 class="font-semibold text-center mb-4">Detail Reservasi</h3>

            <div class="flex flex-wrap justify-center gap-4 md:gap-6 text-sm mb-6">
                <span class="bg-gray-100 px-3 py-1 rounded"><i class="bi bi-door-closed mr-2"></i>
                    {{ $kelas->nama_kelas }}</span>
                <span class="bg-gray-100 px-3 py-1 rounded"><i class="bi bi-calendar3 mr-2"></i>
                    {{ \Carbon\Carbon::parse($tanggal)->format('d M Y') }}</span>
                <span class="bg-blue-50 text-blue-700 px-3 py-1 rounded border border-blue-200">
                    <i class="bi bi-clock mr-2"></i>
                    <span id="summaryJamMulai" class="font-bold"></span> -
                    <span id="summaryJamSelesai" class="font-bold"></span>
                </span>
            </div>

            <a id="btnLanjut" href="#"
                class="block text-center bg-success text-white w-full cursor-pointer hover:bg-green-700 transition-200 p-3 rounded-xl font-semibold shadow-md">
                Lanjut Isi Formulir
            </a>
        </div>

        <div class="mx-4 md:mx-8 mt-6 bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-md text-sm text-gray-700">
            <p class="leading-relaxed">
                <i class="bi bi-info-circle mr-1"></i>
                Klik <span class="font-semibold text-secondary">jam pertama</span> untuk waktu mulai, lalu klik
                <span class="font-semibold text-secondary">jam kedua</span> untuk waktu selesai.
            </p>
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {

                const bookedSlots = @json($bookedSlots ?? []);
                const jamList = @json($jamOperasional ?? []);
                const baseUrlForm = "{{ route('reservasi.form') }}";
                const classId = "{{ $kelas->id }}";
                const selectedDate = "{{ $tanggal }}";

                let jamMulai = null;
                let jamSelesai = null;

                function initReservasiJam() {
                    const summaryJamMulai = document.getElementById("summaryJamMulai");
                    const summaryJamSelesai = document.getElementById("summaryJamSelesai");
                    const jamContainer = document.getElementById("jamContainer");
                    const summaryBox = document.getElementById("summaryBox");
                    const btnLanjut = document.getElementById("btnLanjut");

                    function isBooked(jam) {
                        const jamInt = parseInt(jam.split(':')[0]);
                        return bookedSlots.some(slot => {
                            const start = parseInt(slot.start.split(':')[0]);
                            const end = parseInt(slot.end.split(':')[0]);
                            return jamInt >= start && jamInt < end;
                        });
                    }

                    function getLabel(jam) {
                        if (isBooked(jam)) return "Terisi";
                        if (!jamMulai) return "Pilih Mulai";
                        if (jam === jamMulai) return "Mulai";
                        if (jam === jamSelesai) return "Selesai";
                        return "Pilih Selesai";
                    }

                    function renderSummary() {
                        if (jamMulai && jamSelesai) {
                            summaryJamMulai.textContent = jamMulai;
                            summaryJamSelesai.textContent = jamSelesai;

                            summaryBox.classList.remove("hidden");
                            setTimeout(() => summaryBox.classList.remove("opacity-0"), 10);

                            // optional: update link
                            btnLanjut.href =
                                `${baseUrlForm}?class_id=${classId}&date=${selectedDate}&start=${jamMulai}&end=${jamSelesai}`;
                        } else {
                            summaryBox.classList.add("opacity-0");
                            setTimeout(() => summaryBox.classList.add("hidden"), 300);
                        }
                    }


                    function renderJam() {
                        jamContainer.innerHTML = "";

                        jamList.forEach(jam => {
                            const booked = isBooked(jam);
                            const card = document.createElement("div");

                            card.className =
                                "p-4 rounded-xl shadow-sm text-center transition border flex flex-col justify-between h-28";

                            // =====================
                            // STATE WARNA
                            // =====================
                            if (booked) {
                                card.classList.add(
                                    "bg-gray-100",
                                    "opacity-60",
                                    "cursor-not-allowed",
                                    "border-gray-200"
                                );
                            } else {
                                card.classList.add(
                                    "bg-white",
                                    "cursor-pointer",
                                    "hover:shadow-md",
                                    "border-gray-100"
                                );

                                // JAM MULAI
                                if (jam === jamMulai) {
                                    card.classList.add("border-2", "border-blue-500", "bg-blue-50");
                                }

                                // JAM SELESAI
                                if (jam === jamSelesai) {
                                    card.classList.add("border-2", "border-green-500", "bg-green-50");
                                }

                                // RANGE (di antara mulai & selesai)
                                if (jamMulai && jamSelesai && jam > jamMulai && jam < jamSelesai) {
                                    card.classList.add("bg-green-50", "border-green-200");
                                }

                                card.addEventListener("click", () => handleClick(jam));
                            }

                            card.innerHTML = `
            <p class="font-bold text-lg">${jam}</p>
            <span class="text-xs mt-2 block">${getLabel(jam)}</span>
        `;

                            jamContainer.appendChild(card);
                        });
                    }

                    function handleClick(jam) {
                        if (!jamMulai) {
                            jamMulai = jam;
                        } else if (!jamSelesai && jam > jamMulai) {
                            jamSelesai = jam;
                        } else {
                            jamMulai = jam;
                            jamSelesai = null;
                        }
                        renderJam();
                        renderSummary();
                    }

                    renderJam();

                }

                // 🔥 INI YANG WAJIB
                initReservasiJam();
            });
        </script>
    @endpush
@endsection
