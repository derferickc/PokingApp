<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Model {

	public function poke_user($id)
	{
		$query = "INSERT INTO pokes(poker_id, user_id, created_at, updated_at) VALUES (?,?,NOW(),NOW())";
			$my_id = ($this->session->userdata['userinfo']['id']);
		$values = array($my_id, $id);
		return $this->db->query($query, $values);
	}

	public function fetch_all_pokes()
	{
		$query = "SELECT DISTINCT(poker_id) as poker
				  FROM pokes
				  WHERE user_id=?
				  GROUP BY poker_id";

			$my_id = ($this->session->userdata['userinfo']['id']);
		$pokers = $this->db->query($query, array($my_id))->result_array();
		$count=0;

		foreach ($pokers as $poker){
			$count = $count + 1;
		}

		if ($count == 0)
		{
			$result['total_number_of_pokes'] = '0';
		}
		else
		{
			$result['total_number_of_pokes'] = $count;
			$query = "SELECT COUNT(poker_id) as count, pokers.alias FROM pokes
					  JOIN users as pokers ON pokers.id = pokes.poker_id
					  WHERE user_id = ?
					  GROUP BY poker_id
					  ORDER BY count DESC";

			$result['pokes_by_user'] = $this->db->query($query, array($my_id))->result_array();
		}

	$query = "SELECT users.id, users.name, users.alias, users.email, COUNT(poker_id) as count FROM users
	LEFT JOIN pokes on pokes.user_id = users.id
	WHERE users.id <> ?
	GROUP BY users.id";

	$result['poke_table_info'] = $this->db->query($query, array($my_id))->result_array();
	return $result;
	}
}