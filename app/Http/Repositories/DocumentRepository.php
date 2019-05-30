<?php 


namespace App\Http\Repositories;
use App\Http\Interfaces\DocumentInterface;
use App\Models\Frontend\NewDocument;
use App\Models\Frontend\Tour;
use App\Models\Backend\Admin;
use Carbon;
use Auth;

class DocumentRepository implements DocumentInterface{


	public function __construct(NewDocument $document){
		$this->doc = $document;
	}

	public function getAll(){
		return $this->doc->orderBy('id','DESC')->get();
	}

	public function getByType($type){
		return $this->doc->where('document_type_id',$type)->orderBy('id','DESC')->get();
	}

	public function getVars($id){
		$layout = $this->doc->find($id);
        preg_match_all("/\[([^\]]*)\]/", $layout->layout, $matches);
		$data = [];
        foreach ($matches[1] as $key => $value) {
        	$data[$value] = ucwords(str_replace('_', ' ', $value));
        }

		return $data;
	}

	public function parseData($id,$data){
		$layout = $this->doc->find($id);
        preg_match_all("/\[([^\]]*)\]/", $layout->layout, $matches);

		$newData = str_replace($matches[0], $data, $layout->layout);

		return $newData;
	}

	public function convertVars($tour_id,$contract){

		$tour = Tour::find($tour_id);
		$all = $tour->detPerson();
		$person = $all[0];
		$type = $all[1];
		$company_offer = @$tour->accepted_offer->tour_company;
		$dates = $tour->tour_dates;
		$tourStartDate = Carbon::parse($dates->tour_start_time);
		$tourFinishDate = Carbon::parse($dates->tour_finish_time);
		$address_name_house_number = '';
		$postal_code = '';
		$city = '';  
		$phone = '';
		$email = '';
		$person_id = '';
		$number_of_vacation_days = 7 - count(json_decode($dates->days));
		$now = Carbon::parse(Carbon::now())->format('Y-m-d');
        $admin = Admin::where('id', Auth::guard('webadmin')->user()->id)->with('profile')->first();

		if($type == 'profile'){
			$address_name_house_number = $person->address.' ,'.$person->home;
			$postal_code = $person->postal_code;
			$city = $person->city;
			$phone = $person->phone;
			$email = $person->user->email;
			$person_id = $person->user->id;
		}elseif ($type == 'order_person') {
			$address_name_house_number = $person->address->street.' ,'.$person->address->home;
			$postal_code = $person->address->postal_code;
			$city = $person->address->city;
			$phone = $person->number->mobile_number;
			$email = $person->email->email;
			$person_id = $person->id;
		}	

		$worker_contract_data = [
			'first_name' => @$person->first_name,
			'last_name' => @$person->last_name,
			'sub_company_name' => @$person->company,
			'address_name_house_number' => $address_name_house_number,
			'plz' => $postal_code,
			'city' => $city,

			'sex_type_employment' => '',
			
			'company_first_name' => @$company_offer->first_name,
			'company_last_name' => @$company_offer->last_name,
			'company_address_name_house_number' => @$company_offer->address.' ,'.@$company_offer->home,
			'company_plz' => @$company_offer->postal_code,
			'company_city' => @$company_offer->city,
			
			'date_start_contract' => $now,
			'number_of_hours' => $tourStartDate->diffInMinutes($tourFinishDate,true) / 60,
			'week, month' => '',
			
			'company_location' =>  @$company_offer->address.' ,'.@$company_offer->home.' '.@$company_offer->postal_code.' '.@$company_offer->city,
			
			'income_per_hour' => '',
			'limitted_or_unlimitted_time' => 'limitted',
			'number_of_vacation_days' => $number_of_vacation_days,
			'location_automatic_google' => '',
			'today_date' => $now,
		];

		$connection_contract_data = [
			'super_admin_company_name' => $admin->profile->company,
			'super_admin_first_name' => $admin->profile->first_name,
			'super_admin_last_name' => $admin->profile->last_name,
			'super_admin_address_house_number' => $admin->profile->address->street.' ,'.$admin->profile->address->home,
			'super_admin_plz' => $admin->profile->address->postal_code,
			'super_admin_city' => $admin->profile->address->home,

			'sub_admin_company_name' => @$person->company,
			'sub_admin_first_name' => @$person->first_name,
			'sub_admin_last_name' => @$person->last_name,
			'sub_admin_address_house_number' => $address_name_house_number,
			'sub_admin_plz' => $postal_code,
			'sub_admin_city' => $city,
			'sub_admin_phone' => $phone,
			'sub_admin_email' => $email,
			'sub_admin_id' => $person_id,
			'type_of_service' => '',
			'date_of_contract_start' => $now,
		];

		$service_termination_data = [

			'first_name' => @$company_offer->first_name,
			'last_name' => @$company_offer->last_name,
			'company_who_make_cancel_name' => @$company_offer->company,
			'company_address_name_house_number' => @$company_offer->address.' ,'.@$company_offer->home,
			'company_plz' => @$company_offer->postal_code,
			'company_city' => @$company_offer->city,
			'company_location' => @$company_offer->country,
			'cancellation_date' => @$dates->cancellation_speak_day,

			'company_who_get_cancel_name' => $person->company,
			'address_name_house_number' => $address_name_house_number,
			'plz' => $postal_code,
			'city' => $city,
			'tour_name' => $tour->tour_name,
			'tour_number' => $tour->tour_number,
			'cancation_date_last_working_day' => '',

		];

		$subcontractors_declaration_data = [

			'sub_admin_company_name' => @$person->company,
			'sub_admin_first_name' => @$person->first_name,
			'sub_admin_last_name' => @$person->last_name,
			'sub_admin_address_house_number' => $address_name_house_number,
			'sub_admin_plz' => $postal_code,
			'sub_admin_city' => $city,
			'sub_admin_phone' => $phone,
			'sub_admin_email' => $email,
			'sub_admin_fax' => '',

			'super_admin_company_name' => $admin->profile->company,
			'super_admin_first_name' => $admin->profile->first_name,
			'super_admin_last_name' => $admin->profile->last_name,
			'super_admin_address_house_number' => $admin->profile->address->street.' ,'.$admin->profile->address->home,
			'super_admin_plz' => $admin->profile->address->postal_code,
			'super_admin_city' => $admin->profile->address->home,

			'worker_made_the_paper' => '',
			'name_and_function' => '',
		];

		$data = [
			'Arbeitersnehmer Vertrag' => $worker_contract_data,
			'Systemanschlussvertrag' => $connection_contract_data,
			'Dienstleistung Kündigung' => $service_termination_data,
			'ERKLÄRUNG FÜR UNTERAUFTRAGNEHMER' => $subcontractors_declaration_data,
		];

		return $data[$contract];

	}

}