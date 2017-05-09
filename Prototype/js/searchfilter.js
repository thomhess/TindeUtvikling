$(document).ready(function () {
	var $tomteomrader = [],
		$omradeFilter = [], 
		$fasilitetFilter = [];


	//Kjøres med en gang siden er lastet. Oppretter arrayet som inneholder alle områder som skal dukke opp i søkeresultatet på DOM.
	(function omradeInit() {
		if ($("#area-cont").length > 0) {
			$fasilitetFilter.push("Langrenn"); //Default verdi (Den filtreringen som allerede er på når man laster siden).
			omradeReset();
			checkEmpty();
		} else {
			omradeReset();
		}
	})()

	//Kopierer alle tomteområdene fra det originale JSON arrayet.
	function omradeReset() {
		$tomteomrader = $phpTomteomrader.slice();
		outputPage();
	};

	//Click funksjon for område(Sted) checkboxer. NOTE: Disse click funksjonene burde streamlines litt, for mye duplicate kode. Kan calles med to parameters (filternavn + e.target?)
	$('.cb-omrade').click(function(e) {
		$cb = e.target;
		if ($cb.checked) {
			$omradeFilter.push($($cb).attr('value'));
		} else {
			$index = $omradeFilter.indexOf($($cb).attr('value'));
			$omradeFilter.splice($index, 1);
		};
		checkEmpty();
	})

	//Click funksjon for Aktiviteter og Fasiliteter checkboxer.
	$('.cb-fasilitet').click(function(e) {
		$cb = e.target;
		if ($cb.checked) {
			$fasilitetFilter.push($($cb).attr('value'));
		} else {
			$index = $fasilitetFilter.indexOf($($cb).attr('value'));
			$fasilitetFilter.splice($index, 1);
		};
		checkEmpty();
	})

	//Click funksjon for index.php filtrering knapper.
	$('.btn-filter').click(function(e) {
		$('.btn-filter').removeClass('btn-active');
		$('.btn-filter').addClass('btn-inactive');
		$(e.target).removeClass('btn-inactive');
		$(e.target).addClass('btn-active');
		$fasilitetFilter = [];
		$fasilitetFilter.push($(e.target).attr('Value'));
		arrayFilter();
	})

	//Om ingen av checkboxene er checked, blir alle tomteområdene vist i DOM. Hvis det derimot er noen som er checked, blir arrayFilter called for videre håndtering og filtrering.
	function checkEmpty() {
		if (($omradeFilter.length == 0) && ($fasilitetFilter.length == 0)) {
			omradeReset();
		} else {
			arrayFilter();
		}
	}

	//Bruker $omradeFilter til å søke etter treff i $phpTomteomrader (Alle tomteområdene), og pusher tomteområdet til $tomteomrader om den finner en match.
	function arrayFilter() {
		$omradeFilter.sort();
		if ($omradeFilter.length > 0) {
			$tomteomrader = [];
			for (var i = 0; i < $omradeFilter.length; i++) {
				for (var t = 0; t < $phpTomteomrader.length; t++) {
					if ($phpTomteomrader[t]["area_name"] == $omradeFilter[i]) {
						$tomteomrader.push($phpTomteomrader[t]);
					}
				}
			}
		} else {
			omradeReset();
		}

		//Sjekker om nøkkelordet i fasilitetFilter finnes i noen av tomteområdene i $tomteomrader arrayet. Denne kjører baklengs (starter på slutten av arrayet og går mot starten) pga hvordan splice fungerer.
		if ($fasilitetFilter.length > 0) {
			for (var i = 0; i < $fasilitetFilter.length; i++) {
				for (var t = $tomteomrader.length - 1; 0 <= t; t--) {
					if (!($tomteomrader[t][$fasilitetFilter[i]])) {
						$tomteomrader.splice(t, 1);
					}
				}
			}
		}
		outputPage();
	};

	function replaceSpaceName(tomteomradenavn) {
		var str = tomteomradenavn;
		str = str.replace(/\s+/g, '-').toLowerCase();
		return str;
	}

	//Velger riktig DOM output funksjon avhengig av hvilken side man er på (index.php eller område.php).
	function outputPage() {
		if ($("#search-result").length > 0) {
			outputOmradeDOM();
		} else if ($("#area-cont").length > 0) {
			outputIndexDOM();
		}
	}

	// Sender alle områdene i $tomteområder til område.php DOM.
	function outputOmradeDOM() {
		$("#search-result").empty();
		if (($("#search-result").length > 0) && ($tomteomrader.length > 0)) {
			for (var i = 0; i < $tomteomrader.length; i++) {
			    $("<div>", {class: "row area-result"}).append(
			        $("<div>", {class: "col-lg-4"}).append(
			            $("<a>", {href: "tomteområde/" + replaceSpaceName($tomteomrader[i]["navn"]) }).append(
			            	$("<img>", {
			            		src: $tomteomrader[i]["thumbnail"], //Thumbnail bilde
			            		alt: "Bilde av " + $tomteomrader[i]["navn"] + ".", //Alt text til bilde.
			            		class: "img-result"
			            	}))
			        ), 
			        $("<div>", {class: "col-lg-8"}).append(
			            $("<h2>").text(
			                $tomteomrader[i].navn //Navn på området
			            )
			        ).append(
			        $("<p>").text(
			        	$tomteomrader[i].oneliner //Tekst/Oneliner om området.
			        )).append(
			        $("<p>").append(
			        	"<b>Pris:</b> Fra " + $tomteomrader[i].min_pris + " til " + $tomteomrader[i].max_pris + " kroner."
			        )).append(
			        $("<p>").append(
			        	"<b>Sted:</b> " + $tomteomrader[i].area_name
			        	)  
			    )).appendTo("#search-result")
			};
		} else if ($tomteomrader.length == 0){
			$("#search-result").append("<h3>Fant ingen treff.</h3>")
		}
	}

	//Sender alle områdene i $tomteområder til index.php DOM, max 8 blir vist.
	function outputIndexDOM() {
		$('#area-cont').empty();
		var i = 0;
		while (i < 8) {
			if (i < $tomteomrader.length) {
			$("<div>", {class: "col-md-3 area-align"}).append(
				$("<a>", {href: "tomteområde/" + replaceSpaceName($tomteomrader[i]["navn"]) }).append( //Link til underside. Kan bygges dynamisk, se under.
				$("<img>", {
					src: $tomteomrader[i]["thumbnail"],  //Thumbnail bilde
					alt: "Bilde av " + $tomteomrader[i]["navn"] + "." //Alt tekst til thumbnail bildet
					})).append(
			$("<h1>", {class: "area-name"}).text(
				$tomteomrader[i].navn //Navn på tomteområdet
				))).appendTo("#area-cont")
			}
			i++;
		}
	}

	// Sender bruker videre til tomteområde undersiden, uansett hvor man trykker hen i area-result containeren.
	$('.area-result').click(function(e) {
		$fetchLink = $(this).find("a").attr("href");
		window.location.href = $fetchLink; 
	})
});

