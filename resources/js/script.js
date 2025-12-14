// ========================
// halaman jam.blade.php
// ========================
// Data awal
const jamList = [
    "08:00",
    "09:00",
    "10:00",
    "11:00",
    "12:00",
    "13:00",
    "14:00",
    "15:00",
    "16:00",
];
let jamMulai = null;
let jamSelesai = null;

function initReservasiJam() {
    const jamContainer = document.getElementById("jamContainer");
    const summaryBox = document.getElementById("summaryBox");
    const summaryJamMulai = document.getElementById("summaryJamMulai");
    const summaryJamSelesai = document.getElementById("summaryJamSelesai");

    if (!jamContainer) return; // hindari error jika halaman lain

    // Fungsi menentukan disable
    function jamDisabled(jam) {
        return jamMulai && !jamSelesai && jam < jamMulai;
    }

    // Label tombol
    function getLabel(jam) {
        if (!jamMulai) return "Ajukan";
        if (jam === jamMulai) return "Jam Mulai";
        if (jam === jamSelesai) return "Jam Selesai";
        return "Ajukan";
    }

    // Render card
    function renderJam() {
        jamContainer.innerHTML = "";

        jamList.forEach((jam) => {
            const card = document.createElement("div");
            card.className =
                "bg-white p-4 rounded-xl shadow-md text-center cursor-pointer transition";

            if (jam === jamMulai || jam === jamSelesai) {
                card.classList.add("border-2", "border-green-500");
            }

            if (jamDisabled(jam)) {
                card.classList.add("opacity-50", "cursor-not-allowed");
            }

            card.addEventListener("click", () => handleClick(jam));

            card.innerHTML = `
                <p class="font-medium mb-3">
                    <i class="bi bi-clock-fill mr-2"></i>
                    ${jam}
                </p>
                <button class="bg-success hover:bg-green-700 transition-200 cursor-pointer text-white text-sm w-full p-2 rounded-lg">
                    ${getLabel(jam)}
                </button>
            `;

            jamContainer.appendChild(card);
        });
    }

    // tidak tersedia
    // <button class="bg-Subtle text-white cursor-not-allowed text-sm w-full p-2 rounded-lg">

    // Handle klik
    function handleClick(jam) {
        if (jamDisabled(jam)) return;

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

    // Summary
    function renderSummary() {
        if (jamMulai && jamSelesai) {
            summaryJamMulai.textContent = jamMulai;
            summaryJamSelesai.textContent = jamSelesai;
            summaryBox.classList.remove("hidden");
            setTimeout(() => summaryBox.classList.add("opacity-100"), 10);
        } else {
            summaryBox.classList.remove("opacity-100");
            setTimeout(() => summaryBox.classList.add("hidden"), 300);
        }
    }

    // Render awal
    renderJam();
}
document.addEventListener("DOMContentLoaded", initReservasiJam);

// ========================
// KELUAR topbar.blade.php
// ========================
document.addEventListener("DOMContentLoaded", () => {
    const logoutBtn = document.getElementById("logoutBtn");
    const logoutDropdown = document.getElementById("logoutDropdown");
    const cancelLogout = document.getElementById("cancelLogout");
    const wrapper = document.getElementById("logoutWrapper");

    let open = false;

    function toggleDropdown() {
        open = !open;

        if (open) {
            logoutDropdown.classList.remove("hidden");
            setTimeout(() => logoutDropdown.classList.add("opacity-100"), 10);
        } else {
            logoutDropdown.classList.remove("opacity-100");
            setTimeout(() => logoutDropdown.classList.add("hidden"), 200);
        }
    }

    // Klik tombol keluar
    logoutBtn.addEventListener("click", (e) => {
        e.stopPropagation();
        toggleDropdown();
    });

    // Klik tombol batal
    cancelLogout.addEventListener("click", () => {
        open = true;
        toggleDropdown();
    });

    // Klik di luar dropdown → close
    document.addEventListener("click", (e) => {
        if (!wrapper.contains(e.target) && open) {
            open = true;
            toggleDropdown();
        }
    });
});

// ========================
// POPUP NOTIFIKASI topbar.blade.php
// ========================
document.addEventListener("DOMContentLoaded", () => {
    const notifBtn = document.getElementById("notifBtn");
    const notifDropdown = document.getElementById("notifDropdown");
    const notifWrapper = document.getElementById("notifWrapper");

    let openNotif = false;

    function toggleNotif() {
        openNotif = !openNotif;

        if (openNotif) {
            notifDropdown.classList.remove("hidden");
            setTimeout(() => notifDropdown.classList.add("opacity-100"), 10);
        } else {
            notifDropdown.classList.remove("opacity-100");
            setTimeout(() => notifDropdown.classList.add("hidden"), 200);
        }
    }

    // Klik tombol icon
    notifBtn.addEventListener("click", (e) => {
        e.stopPropagation();
        toggleNotif();
    });

    // Klik luar → tutup
    document.addEventListener("click", (e) => {
        if (!notifWrapper.contains(e.target) && openNotif) {
            openNotif = true;
            toggleNotif();
        }
    });
});

// ========================
// DROPRIGHT LANTAI ruang.blade.php
// ========================
document.addEventListener("DOMContentLoaded", () => {
    const btnLantai = document.getElementById("btnLantai");
    const dropdownLantai = document.getElementById("dropdownLantai");
    const lantaiWrapper = document.getElementById("lantaiWrapper");

    let open = false;

    function toggleDropdown() {
        open = !open;

        if (open) {
            dropdownLantai.classList.remove("hidden");
            setTimeout(() => {
                dropdownLantai.classList.remove("opacity-0", "-translate-x-3");
                dropdownLantai.classList.add("opacity-100", "translate-x-0");
            }, 10);
        } else {
            dropdownLantai.classList.remove("opacity-100", "translate-x-0");
            dropdownLantai.classList.add("opacity-0", "-translate-x-3");

            setTimeout(() => dropdownLantai.classList.add("hidden"), 200);
        }
    }

    // Klik tombol lantai
    btnLantai.addEventListener("click", (e) => {
        e.stopPropagation();
        toggleDropdown();
    });

    // Klik luar dropdown → tutup
    document.addEventListener("click", (e) => {
        if (!lantaiWrapper.contains(e.target) && open) {
            toggleDropdown();
        }
    });
});

// ========================
// halaman form form.blade.php
// ========================
document.addEventListener("DOMContentLoaded", () => {
    // ========= BATAL =========
    const btnBatal = document.getElementById("btn-batal");
    const popupBatal = document.getElementById("popup-batal");
    const batalTidak = document.getElementById("batal-tidak");

    // Buka popup batal
    btnBatal?.addEventListener("click", () => {
        popupBatal.classList.remove("hidden");
    });

    // Klik tombol tidak
    batalTidak?.addEventListener("click", () => {
        popupBatal.classList.add("hidden");
    });

    // Klik di luar popup → tutup
    document.addEventListener("click", (e) => {
        if (
            popupBatal &&
            !popupBatal.contains(e.target) &&
            !btnBatal.contains(e.target)
        ) {
            popupBatal.classList.add("hidden");
        }
    });

    // ========= AJUKAN =========
    const btnAjukan = document.getElementById("btn-ajukan");
    const popupAjukan = document.getElementById("popup-ajukan");
    const ajukanTutup = document.getElementById("ajukan-tutup");

    // Buka popup ajukan
    btnAjukan?.addEventListener("click", () => {
        popupAjukan.classList.remove("hidden");
    });

    // Tutup popup ajukan
    ajukanTutup?.addEventListener("click", () => {
        popupAjukan.classList.add("hidden");
    });

    // Klik luar popup ajukan → tutup
    document.addEventListener("click", (e) => {
        if (
            popupAjukan &&
            !popupAjukan.contains(e.target) &&
            !btnAjukan.contains(e.target)
        ) {
            popupAjukan.classList.add("hidden");
        }
    });
});
