<?php require('dblogin.php');

class fetchTomter {

	public function __construct() {
		$this->dbc = new dblogin();
	}

	// Fetcher alle tomter som har det spesifiserte feltnummeret.
	public function fetchPerFeltnr($feltnr) {
		$query = "SELECT * FROM tomter WHERE feltnr=?";
		$stmnt = $this->dbc->db->prepare($query);
		if ($stmnt->execute(array($feltnr))) {
			$tomter = $stmnt->fetchAll(PDO::FETCH_NUM);
			return $tomter;
		}
		$this->dbc = null;
	}
}


class fetchTomteområder {

	public function __construct() {
		$this->dbc = new dblogin();
	}

	// Fetcher alle tomteområdene i tomteområde tabellen.
	public function fetchAll() {
		$query = "SELECT * FROM tomteområde";
		$stmnt = $this->dbc->db->prepare($query);
		if ($stmnt->execute()) {
			$tomteområder = $stmnt->fetchAll(PDO::FETCH_ASSOC);
			return $tomteområder;
		}
		$this->dbc = null;
	}

	// Fetcher et enkelt tomteområde basert på spesifisert navn.
	public function fetchSingle($feltnr) {
		$query = "SELECT * FROM tomteområde WHERE navn=?";
		$stmnt = $this->dbc->db->prepare($query);
		if ($stmnt->execute(array($feltnr))) {
			$tomteområde = $stmnt->fetchAll(PDO::FETCH_ASSOC);
			return $tomteområde;
		}
		$this->dbc = null;
	}

/*	public $tomteomrader = array(
		array("Feltnr"=>"12345", "Navn"=>"Gålåtoppen", "Oneliner"=>"Flotte hyttetomter som ligger høyt og usjenert med fantastisk utsikt over Gålåvatnet. Rondane-massivene og Jotunheimen ruver i horisonten.", "Tekst"=>"Blah BLAH blah", "Bilde"=>"img/4046-f8184968280632c1e0dcddfb36da6de0-7977f928de23ce5601691f2c748a301324.jpg", "Område"=>"Gudbrandsdalen Nord", "Strøm"=>"Y", "Vann"=>"Y", "Avløp"=>"Y", "Vei"=>"Y", "Tur"=>"Y", "Langrenn"=>"Y", "Alpint"=>"Y"),
		array("Feltnr"=>"23523", "Navn"=>"Femundsmarka", "Oneliner"=>"En hytte i dette området gir et godt utgangspunkt til fritidsopplevelser både sommer og vinter!", "Tekst"=>"Blah BLAH BLAH", "Bilde"=>"img/4039-c544bd176878d642a7883180c6c69d9e-2c4541be28649e23415f7f67b5bc7e5fnordseter1.jpg", "Område"=>"Hedmark", "Strøm"=>"Y", "Vann"=>"Y", "Avløp"=>"Y", "Jakt"=>"Y", "Tur"=>"Y", "Fiske"=>"Y", "Langrenn"=>"Y"),
		array("Feltnr"=>"82342", "Navn"=>"Liabygda", "Oneliner"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae blanditiis eius enim esse cumque eligendi voluptatem doloremque libero doloribus debitis animi!", "Tekst"=>"Blahrgh blah blurgh", "Bilde"=>"img/4023-c4fd5d532cb57e7f1a84987c0b34352e-2b9a2424d58d18de7bb26e547aa2bbb8nordseter5.jpg", "Område"=>"Sør-Trøndelag", "Strøm"=>"Y", "Fiske"=>"Y", "Tur"=>"Y", "Langrenn"=>"Y"),
		array("Feltnr"=>"23564", "Navn"=>"Hjerkinnlia Fjellgrend", "Oneliner"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae blanditiis eius enim esse cumque eligendi voluptatem doloremque libero doloribus debitis animi!", "Tekst"=>"Blahrgh blah blurgh", "Bilde"=>"img/4037-9d674db4a1df6b0df94c81469c23696d-a3c0a85afc1f59979df1b5511e1b134b13.jpg", "Område"=>"Hedmark", "Strøm"=>"Y", "Avløp"=>"Y", "Vei"=>"Y", "Jakt"=>"Y", "Tur"=>"Y", "Langrenn"=>"Y"),
		array("Feltnr"=>"58349", "Navn"=>"Lillehammer Sæter III", "Oneliner"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae blanditiis eius enim esse cumque eligendi voluptatem doloremque libero doloribus debitis animi!", "Tekst"=>"Blahrgh blah blurgh", "Bilde"=>"img/4086-1cfef19396bbccc6209b2f4c1b479812-47e49c0da3e9603a47f1a081dbb8e9delangrenn_esben_haakenstad_2007_917.jpg", "Område"=>"Gudbrandsdalen Sør", "Strøm"=>"Y", "Avløp"=>"Y", "Vei"=>"Y", "Tur"=>"Y", "Alpint"=>"Y", "Langrenn"=>"Y"),
		array("Feltnr"=>"45673", "Navn"=>"Låvåshaugen Panorama", "Oneliner"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae blanditiis eius enim esse cumque eligendi voluptatem doloremque libero doloribus debitis animi!", "Tekst"=>"Blahrgh blah blurgh", "Bilde"=>"img/3610-6317b676de359186a6b008f3d8c8efd0-0b71b6b7b89d687c5e07f83650669fb320_utsikt_1.jpg", "Område"=>"Sør-Trøndelag", "Strøm"=>"Y", "Avløp"=>"Y", "Vei"=>"Y", "Jakt"=>"Y", "Langrenn"=>"Y", "Fiske"=>"Y"),
		array("Feltnr"=>"13464", "Navn"=>"Raudalen", "Oneliner"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae blanditiis eius enim esse cumque eligendi voluptatem doloremque libero doloribus debitis animi!", "Tekst"=>"Blahrgh blah blurgh", "Bilde"=>"img/4061-1f46df75421721feb93d21fa32064576-69a53dd84dd0c56f2ca1012320ad7cddlvshaugen4.jpg", "Område"=>"Valdres", "Strøm"=>"Y", "Avløp"=>"Y", "Vei"=>"Y", "Tur"=>"Y", "Langrenn"=>"Y", "Alpint"=>"Y"),
		array("Feltnr"=>"43563", "Navn"=>"Haugsetra Hyttegrend", "Oneliner"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae blanditiis eius enim esse cumque eligendi voluptatem doloremque libero doloribus debitis animi!", "Tekst"=>"Blahrgh blah blurgh", "Bilde"=>"img/4103-3bd758f731ecdbb498f15e90712fd93a-b4dc47ac9839afe4cba7d8ce3b5d1ccd02.jpg", "Område"=>"Gudbrandsdalen Nord", "Strøm"=>"Y", "Avløp"=>"Y", "Vei"=>"Y", "Tur"=>"Y", "Fiske"=>"Y"),
		array("Feltnr"=>"34678", "Navn"=>"Ringebu Panorama", "Oneliner"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae blanditiis eius enim esse cumque eligendi voluptatem doloremque libero doloribus debitis animi!", "Tekst"=>"Blahrgh blah blurgh", "Bilde"=>"img/4105-427fe031bcddffb5a05362402216573d-12bfe86bc22a2bcf57e972444fbdd0fa05utsikt.jpg", "Område"=>"Gudbrandsdalen Sør", "Strøm"=>"Y", "Avløp"=>"Y", "Vei"=>"Y", "Tur"=>"Y", "Jakt"=>"Y", "Langrenn"=>"Y"),
		array("Feltnr"=>"34678", "Navn"=>"Hjerkinnhø Hyttegrend", "Oneliner"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae blanditiis eius enim esse cumque eligendi voluptatem doloremque libero doloribus debitis animi!", "Tekst"=>"Blahrgh blah blurgh", "Bilde"=>"img/4142-e4b895d6b72df2258affe33a1c1a7155-8be89426803c20a68642b95875a86a5ehjerkinnhhyttegrend.jpg", "Område"=>"Gudbrandsdalen Sør", "Strøm"=>"Y", "Avløp"=>"Y", "Vei"=>"Y", "Tur"=>"Y", "Jakt"=>"Y", "Langrenn"=>"Y", "Fiske"=>"Y")
		);*/
}



?>