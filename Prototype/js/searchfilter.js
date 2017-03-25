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
		$('.btn-filter').removeClass('active');
		$('.btn-filter').addClass('inactive');
		$(e.target).parent('li').addClass('active');
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
					if ($phpTomteomrader[t]["Område"] == $omradeFilter[i]) {
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
			            $("<a>", {href: "område/skreikampen.html"}).append( //Denne nødvendig???
			            	$("<img>", {
			            		src: $tomteomrader[i]["Bilde"], // Hvordan velger vi hvilket bilde som skal vises (fra array).
			            		alt: "Bilde av " + $tomteomrader[i]["Navn"] + ".",
			            		class: "img-result"
			            	}))
			        ), 
			        $("<div>", {class: "col-lg-8"}).append(
			            $("<h2>").text(
			                $tomteomrader[i].Navn //Navn på området
			            )
			        ).append(
			        $("<p>").text(
			        	$tomteomrader[i].Oneliner //Tekst/Oneliner om området.
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
			$("<div>", {class: "col-md-3"}).append(
				$("<a>", {href: "område/skreikampen.html"}).append( //Link til underside. Kan bygges dynamisk, se under.
				$("<img>", {
					src: $tomteomrader[i]["Bilde"],  // Hvordan velger vi hvilket bilde som skal vises (fra array).
					alt: "Bilde av " + $tomteomrader[i]["Navn"] + "."
					}))).appendTo("#area-cont")
			}
			i++;
		}
	}

	// Sender bruker videre til tomteområde undersiden, uansett hvor man trykker hen i area-result containeren.
	$('.area-result').click(function(e) {
		window.location.href = "område/skreikampen.html"; 
		//Litt usikker på hvordan vi går fram for å gjøre denne. De må nok ha linken allerede tilknyttet seg på en måte når de blir sendt til DOM. 
		//Kanskje fetches fra a? ELLER kun hente ut navnet på området fra DOM og sette det sammen med resten av filepathen ("område/"), siden alle undersidene ligger på samme sted uansett.
	})
	
});

