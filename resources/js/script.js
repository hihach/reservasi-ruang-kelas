// ========================
// KELUAR components/logout-dropdown.blade.php
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
// POPUP NOTIFIKASI components/notifikasi-popup.blade.php
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
// DROPRIGHT LANTAI pages/ruang.blade.php
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
            // Delay dikit biar transisi CSS jalan
            setTimeout(() => {
                dropdownLantai.classList.remove("opacity-0", "-translate-x-5");
                dropdownLantai.classList.add("opacity-100", "translate-x-0");
            }, 10);
        } else {
            dropdownLantai.classList.remove("opacity-100", "translate-x-0");
            dropdownLantai.classList.add("opacity-0", "-translate-x-5");

            setTimeout(() => dropdownLantai.classList.add("hidden"), 300);
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
// halaman form pages/form.blade.php
// ========================
document.addEventListener("DOMContentLoaded", () => {
    const btnBatal = document.getElementById("btn-batal");
    const popupBatal = document.getElementById("popup-batal");
    const batalTidak = document.getElementById("batal-tidak");

    btnBatal.addEventListener("click", () =>
        popupBatal.classList.remove("hidden"),
    );
    batalTidak.addEventListener("click", () =>
        popupBatal.classList.add("hidden"),
    );

    // Klik background tutup popup
    popupBatal.addEventListener("click", (e) => {
        if (e.target === popupBatal) popupBatal.classList.add("hidden");
    });
});
