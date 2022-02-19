<?php
class chartmodel extends CI_Model{
		function bulan(){
			$query = $this->db->query("SELECT COUNT(*) as jumlah, DATE_FORMAT(tbmasuk.tglinput,'%M') as bulan FROM tbmasuk, tbdetailmasuk where tbmasuk.nomasuk= tbdetailmasuk.nomasuk group by tbmasuk.tglinput");
			 
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$result[] = $data;
				}
				return $result;
			}
		}

		function keluar(){
			$query = $this->db->query("SELECT COUNT(*) as jumlah, DATE_FORMAT(tbbarangkeluar.tanggalkeluar,'%M') as bulan FROM tbbarangkeluar,tbdetailbarangkeluar where tbbarangkeluar.nokeluar= tbdetailbarangkeluar.nokeluar group by tbbarangkeluar.tanggalkeluar");
			 
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$result[] = $data;
				}
				return $result;
			}
		}

	}
        ?>