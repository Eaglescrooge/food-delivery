<?php
		function showOrder($dummy) {
			
			$result = "";
			
			while($select = mysqli_fetch_array($dummy)){
				$result .= "<tr><td>".$select[1]."</td>";
				$result .= "<td>".$select[2]."</td>";
				$result .= "<td>".$select[3]."</td>";
				$result .= "<td>".$select[4]."</td>";
				$result .= "<td>".$select[3] * $select[4]."</td></tr>";
				
				
				
				}
			
			return $result;
			
			
		}



?>