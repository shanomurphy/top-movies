/**
 * Lazy Load Images
 * ================
*/

// Common vars
var button = document.getElementById('js-view-images');
var root = document.documentElement;

// Lazy load images
function load_images() {

	var img_defer = document.getElementsByClassName('js-lazy-load');

	// Run through each item and apply background image
	for (var i=0; i<img_defer.length; i++) {
		if(img_defer[i].getAttribute('data-src')) {
			var img_url = img_defer[i].getAttribute('data-src');
			img_defer[i].style.backgroundImage = 'url('+img_url+')';
		}
	}

	// Use local storage and set call on <html>
	if ( button.innerHTML == 'x hide images') {
		root.classList.remove('lazy-loaded');
		button.innerHTML = 'show images';
		localStorage.removeItem('show_images');
	}
	else {
		button.innerHTML = 'x hide images';
		root.className += ' lazy-loaded';
		localStorage.setItem('show_images', 'yes');
	}

}

button.onclick = load_images;

function storage_check() {
	if ( localStorage.show_images == 'yes') {
		load_images();
	}
}

window.onload = storage_check;