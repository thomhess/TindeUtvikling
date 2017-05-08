<?php require_once('dblogin.php');

class fetchTomter {
	// Fetcher alle tomter som har det spesifiserte feltnummeret.
	public function fetchPerFeltnr($feltnr) {
		global $dblogin;
		$query = "SELECT * FROM tomter WHERE feltnr=?";
		$stmnt = $dblogin->db->prepare($query);
		if ($stmnt->execute(array($feltnr))) {
			$tomter = $stmnt->fetchAll(PDO::FETCH_ASSOC);
			return $tomter;
		}
	}

	public function fetchAll() {
		global $dblogin;
		$query = "SELECT * FROM tomter";
		$stmnt = $dblogin->db->prepare($query);
		if ($stmnt->execute()) {
			$tomter = $stmnt->fetchAll(PDO::FETCH_ASSOC);
			return $tomter;
		}
	}
}


class fetchTomteområder {

	// Fetcher alle tomteområdene i tomteområde tabellen.
	public function fetchAll() {
		global $dblogin;
		$query = "SELECT * FROM tomteområde";
		$stmnt = $dblogin->db->prepare($query);
		if ($stmnt->execute()) {
			$tomteområder = $stmnt->fetchAll(PDO::FETCH_ASSOC);
			return $tomteområder;
		}
	}

	// Fetcher et enkelt tomteområde basert på spesifisert navn.
	public function fetchSingle($feltnr) {
		global $dblogin;
		$query = "SELECT * FROM tomteområde WHERE navn=? LIMIT 1";
		$stmnt = $dblogin->db->prepare($query);
		if ($stmnt->execute(array($feltnr))) {
			$tomteområde = $stmnt->fetch(PDO::FETCH_ASSOC);
			return $tomteområde;
		}
	}

	// Fetcher alle kolonner i tomtefasiliteter tabellen.
	public function fetchAllTomtefasiliteter() {
		global $dblogin;
		$query = "SELECT * FROM tomtefasiliteter";
		$stmnt = $dblogin->db->prepare($query);
		if ($stmnt->execute()) {
			$tomtefasiliteter = $stmnt->fetchAll(PDO::FETCH_ASSOC);
			return $tomtefasiliteter;
		}
	}


	// Setter inn fasiliteter values til slutten av tomteområde arrayet.
	public function mergeTomtefasiliteterArray($tomteområder, $tomtefasiliteter) {
		$tomteCount = count($tomteområder);
		$fasilitetCount = count($tomtefasiliteter);
		for ($i = 0; $i < $tomteCount; $i++) {
			for ($e = 0; $e < $fasilitetCount; $e++) {
				if ($tomteområder[$i]["felt_nr"] == $tomtefasiliteter[$e]["feltnr"]) {
					$tomteområder[$i][$tomtefasiliteter[$e]["fasilitet_navn"]] = $tomtefasiliteter[$e]["fasilitet_navn"];
				}
			}
		}
		return $tomteområder;
	}

	public function mergeTomtepriser($tomteområder, $tomter) {
		$tomteområdeCount = count($tomteområder);
		$tomteCount = count($tomter);
		for ($i = 0; $i < $tomteområdeCount; $i++) {
			for ($e = 0; $e < $tomteCount; $e++) {
				if ($tomteområder[$i]["felt_nr"] == $tomter[$e]["feltnr"]) {
					$tomterResult[]["pris"] = $tomter[$e]["pris"];
				}
			}

			if (!empty($tomterResult)) {
				$max = max(array_column($tomterResult, 'pris'));
				$min = min(array_column($tomterResult, 'pris'));
				$tomteområder[$i]["min_pris"] = $min;
				$tomteområder[$i]["max_pris"] = $max;
				$tomterResult = array();
			}
		}
		return $tomteområder;
	}
}
?>