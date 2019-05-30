<?php 


namespace App\Http\Interfaces;

interface DocumentInterface{


	public function getAll();

	public function getByType($type);

	public function getVars($id);

	public function parseData($id,$data);

	public function convertVars($tour_id,$contract);

}