const lawsList = document.getElementById("lawsList");
const searchInput = document.getElementById("search");
const categoryFilter = document.getElementById("categoryFilter");

let lawsData = [];

fetch('db.json')
  .then(res => res.json())
  .then(data => {
    lawsData = data;
    populateCategories();
    displayLaws(lawsData);
  });

function populateCategories(){
  const categories = [...new Set(lawsData.map(law=>law.category))];
  categories.forEach(cat=>{
    const option = document.createElement("option");
    option.value = cat;
    option.textContent = cat;
    categoryFilter.appendChild(option);
  });
}

function displayLaws(laws){
  lawsList.innerHTML="";
  laws.forEach(law=>{
    const li = document.createElement("li");
    li.innerHTML = `<a href="${law.link}" target="_blank">${law.title} (${law.number})</a> [${law.category}]`;
    lawsList.appendChild(li);
  });
}

searchInput.addEventListener("input", filterLaws);
categoryFilter.addEventListener("change", filterLaws);

function filterLaws(){
  const searchTerm = searchInput.value.toLowerCase();
  const category = categoryFilter.value;
  const filtered = lawsData.filter(law=>{
    const matchSearch = law.title.toLowerCase().includes(searchTerm);
    const matchCategory = category==="All" || law.category===category;
    return matchSearch && matchCategory;
  });
  displayLaws(filtered);
}