document.addEventListener("DOMContentLoaded", function () {

  const composeBtn = document.getElementById("composeBtn");
  const searchBox = document.getElementById("searchBox");
  const rows = document.querySelectorAll("#emailTable tbody tr");
  const addNoteBtn = document.getElementById("addNoteBtn");
  const noteInput = document.getElementById("noteInput");
  const notesList = document.getElementById("notesList");
  const menuItems = document.querySelectorAll(".menu li");

  /* ---------------- Sidebar Switching ---------------- */
  menuItems.forEach(item => {
    item.addEventListener("click", function () {
      menuItems.forEach(i => i.classList.remove("active"));
      this.classList.add("active");
    });
  });

  /* ---------------- Compose Button ---------------- */
  composeBtn.addEventListener("click", function () {
    const email = prompt("Enter recipient email:");
    if (email) {
      alert("Email sent to " + email);
    }
  });

  /* ---------------- Search Filter ---------------- */
  searchBox.addEventListener("keyup", function () {
    const filter = searchBox.value.toLowerCase();

    document.querySelectorAll("#emailTable tbody tr").forEach(row => {
      const text = row.innerText.toLowerCase();
      row.style.display = text.includes(filter) ? "" : "none";
    });
  });

  /* ---------------- Email Row Features ---------------- */
  rows.forEach(row => {

    // Add star dynamically
    const star = document.createElement("span");
    star.innerHTML = " ★";
    star.classList.add("star");
    row.children[1].appendChild(star);

    // Select email
    row.addEventListener("click", function (e) {
      if (e.target.classList.contains("star")) return;

      rows.forEach(r => r.classList.remove("selected"));
      this.classList.add("selected");

      alert("Opening email from: " + row.children[0].innerText);
    });

    // Star toggle
    star.addEventListener("click", function (e) {
      e.stopPropagation();
      star.classList.toggle("active");
    });

  });

  /* ---------------- Add Notes ---------------- */
  function addNote() {
    const text = noteInput.value.trim();
    if (text !== "") {
      const li = document.createElement("li");
      li.textContent = text;

      li.addEventListener("click", function () {
        li.remove(); // remove note when clicked
      });

      notesList.appendChild(li);
      noteInput.value = "";
    }
  }

  addNoteBtn.addEventListener("click", addNote);

  noteInput.addEventListener("keypress", function (e) {
    if (e.key === "Enter") {
      addNote();
    }
  });

  /* ---------------- Click Outside Email ---------------- */
  document.addEventListener("click", function (e) {
    if (!e.target.closest("#emailTable")) {
      rows.forEach(r => r.classList.remove("selected"));
    }
  });

});