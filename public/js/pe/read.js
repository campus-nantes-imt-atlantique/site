// If absolute URL from the remote server is provided, configure the CORS
// header on that server.

// Loaded via <script> tag, create shortcut to access PDF.js exports.
let pdfjsLib = window['pdfjs-dist/build/pdf'];
// The workerSrc property shall be specified.
pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

let pdfDoc = null,
    pageNum = 1,
    ratio,
    scale,
    portrait,
    flipbookInitialised = false,
    flipbookScale = 0.95;

function addPage(num_page, chain=false) {
	// Le hide permet de cacher le canvas tant qu'il n'est pas dans le flipbook
	let canvas = $('<canvas id="page-' + num_page + '"></canvas>').appendTo('#flipbook').hide();
	// Using promise to fetch the page
	pdfDoc.getPage(num_page).then(function(page) {
		if (scale == null) {
			let unscaledViewport = page.getViewport({scale: 1});
			ratio = unscaledViewport.width/unscaledViewport.height;
			scale = Math.min(Math.max(unscaledViewport.height / getHeight(),
				unscaledViewport.width / getWidth()), 2);
			
		}
		let viewport = page.getViewport({scale: scale});
		canvas[0].height = viewport.height;
		canvas[0].width = viewport.width;
		// Render PDF page into canvas context
		let renderContext = {
			canvasContext: canvas[0].getContext('2d'),
			viewport: viewport
		};
		let renderTask = page.render(renderContext);
		renderTask.promise.then(function() {
			if (!flipbookInitialised) { initFlipbook() } 
			else { $('#flipbook').turn('addPage', canvas) }
			canvas.delay(500).fadeIn(500);
			if (chain) {
				if (num_page < pdfDoc.numPages) { addPage(num_page+1, chain=true) }
				else { $('#flipbook').turn("peel", "br") }
			}
		});
	});
}

function initFlipbook() {
	portrait = $(window).height() > $(window).width();
	let flipbook = $("#flipbook");
	flipbook.turn({
		width: getWidth(), 
		height: getHeight()
	});
	flipbook[0].style.margin = getHeightMargin() + "px " + getWidthMargin() + "px";
	flipbookInitialised = true;
	// On retire la zone de chargement
	$(".loader-body").fadeOut(500, function() { $(this).remove() });
  	flipbook.fadeIn(500);
}

function updateFlipbook() {
	portrait = $(window).height() > $(window).width();
	let flipbook = $("#flipbook");
	flipbook.turn('size', getWidth(), getHeight());
	flipbook[0].style.margin = getHeightMargin() + "px " + getWidthMargin() + "px";
}

function getHeight() {
	return Math.min($(window).height(), $(window).width()/(2*ratio))*flipbookScale;
}

function getWidth() {
	return getHeight()*2*ratio;
}

function getHeightMargin() {
	return ($(window).height() - getHeight())/2;
}

function getWidthMargin() {
	return ($(window).width() - getWidth())/2;
}

$(window).on('load', function() {
	let url = $('#flipbook').attr('url');
	pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
		pdfDoc = pdfDoc_;
		addPage(1, chain=true);
	});
});

$(window).resize(function () {
	let currentPortrait = $(window).height() > $(window).width();
	if (portrait !== currentPortrait) { updateFlipbook() }
});

