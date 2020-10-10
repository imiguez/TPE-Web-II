"use strict";

document.getElementById("dropdownMenuButton").addEventListener("click", toggleLinks);


function toggleLinks() {
    let dropmenu = document.getElementById("dropdown-menu");
    dropmenu.classList.toggle("dropdown-menu");

}