// ============================
// 🌌 Honkai Star Rail CMS - JS
// ============================

// 1. DOM Manipulation: Tambahkan daftar karakter secara dinamis
const karakterContainer = document.createElement("section");
karakterContainer.innerHTML = `
  <h2>Daftar Karakter</h2>
  <div id="character-list"></div>
`;
document.querySelector("main").appendChild(karakterContainer);

// Data karakter dummy
const karakterHSR = [
  { name: "Dan Heng • Imbibitor Lunae", path: "Destruction", element: "Imaginary" },
  { name: "Kafka", path: "Nihility", element: "Lightning" },
  { name: "March 7th", path: "Preservation", element: "Ice" }
];

// Render data ke dalam DOM
const listContainer = document.getElementById("character-list");

karakterHSR.forEach(char => {
  const card = document.createElement("div");
  card.className = "card";
  card.innerHTML = `
    <h3>${char.name}</h3>
    <p><strong>Path:</strong> ${char.path}</p>
    <p><strong>Element:</strong> ${char.element}</p>
    <button class="btn btn-primary">Detail</button>
  `;

  // 2. Event Listener: klik tombol detail
  card.querySelector("button").addEventListener("click", () => {
    alert(`Nama: ${char.name}\nPath: ${char.path}\nElement: ${char.element}`);
  });

  listContainer.appendChild(card);
});

