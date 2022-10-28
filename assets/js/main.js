/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

 document.addEventListener("DOMContentLoaded", function(){
	// make it as accordion for smaller screens
	let dropdowns = document.querySelectorAll('.dropdown-toggle');
    dropdowns.forEach((dd)=>{
        dd.addEventListener('click', function (e) {
            var el = this.nextElementSibling;
            el.style.display = el.style.display==='block'?'none':'block';
            e.preventDefault();
        })
    });
	// end if innerWidth
}); 