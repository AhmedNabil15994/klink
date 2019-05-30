<?php

namespace App\Http\Controllers\Backend;

use Helper;
use Response;
use Carbon;
use Validator;
use PDF;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\Admin;
use App\Models\Frontend\NewDocument;
use App\Models\Pages;
use App\Models\Frontend\DocumentType;
use App\Http\Interfaces\DocumentInterface;

class DocumentController extends Controller
{
    public $types = [
                    [
                        'id' => '1',
                        'title' => 'Super Admin',
                        'value' => 'super_admin',
                    ],
                    [
                        'id' => '2',
                        'title' => 'Sub Domain',
                        'value' => 'sub_domain',
                    ],
                    [
                        'id' => '3',
                        'title' => 'User',
                        'value' => 'user',
                    ],
                    [
                        'id' => '4',
                        'title' => 'Company',
                        'value' => 'company',
                    ],
                    [
                        'id' => '5',
                        'title' => 'Driver',
                        'value' => 'driver',
                    ],
                    [
                        'id' => '6',
                        'title' => 'Business Customer',
                        'value' => 'business_customer',
                    ],
        ];

    public function index(DocumentInterface $docInterface, Request $request)
    {
        $this->data['data'] =  $docInterface->getAll();
        $this->data['pages'] = Pages::orderBy('title','ASC')->get();
        $this->data['types'] = DocumentType::orderBy('name','ASC')->get();
        if($request->ajax()){
            return view('backend.adminlte.documents.Ajax.filter', $this->data)->render();
        }
        return view('backend.adminlte.documents.main', $this->data);
    }

    public function filterByType(DocumentInterface $docInterface,$id)
    {
        $this->data['data'] =  $docInterface->getByType($id);
        return view('backend.adminlte.documents.Ajax.filter', $this->data)->render();
    }

    public function editDocumentRoute(Request $request){
        $doc = NewDocument::find($request->id);
        $doc->page_id = $request->page_id;
        $doc->save();
        return 1;
    }

    public function storeTemplate(Request $request)
    {
        $doc = new NewDocument;
        $doc->name = $request->name;
        $doc->layout = $request->layout;
        $doc->description = $request->description;
        $doc->document_type_id = $request->document_type_id;
        $doc->page_id = $request->page_id;
        if(!empty($request->display_for)){
            $doc->display_for = serialize($request->display_for);
        }
        $doc->save();
        return 1;
    }
    public function destroyTemplate(Request $request)
    {
        NewDocument::find($request->id)->delete();
        return 1;
    }
    public function showTemplate($id,DocumentInterface $docInterface)
    {   
        $this->data['vars'] = $docInterface->getVars($id);
        $this->data['data'] = NewDocument::find($id);
        $this->data['pages'] = Pages::get();
        $this->data['types'] = DocumentType::orderBy('id', 'DESC')->get();
        $this->data['persons'] = (object) $this->types; 

        return view('backend.adminlte.documents.showTemplate', $this->data);
    }
    public function editTemplate(Request $request)
    {
        $doc = NewDocument::find($request->id);
        $doc->name = $request->name;
        $doc->layout = $request->layout;
        $doc->description = $request->description;
        $doc->document_type_id = $request->document_type_id;
        $doc->page_id = $request->page_id;
        if(!empty($request->display_for)){
            $doc->display_for = serialize($request->display_for);
        }
        $doc->save();
        return 1;
    }
    public function newTemplate()
    {
        $this->data['types'] = DocumentType::orderBy('id', 'DESC')->get();
        $this->data['pages'] = Pages::get();
        $this->data['persons'] = (object) $this->types; 
        return view('backend.adminlte.documents.newTemplate', $this->data);
    }

    public function convertTemplate(Request $request , DocumentInterface $docInterface){
        $data = $docInterface->parseData($request->id,$request->myVars);
        return $data;
    }

    public function getVars(Request $request , DocumentInterface $docInterface){
        $data = $docInterface->getVars($request->id);
        $doc = NewDocument::find($request->id);
        $all = $docInterface->convertVars($request->tour_id,$doc->name);

        return $all;
    }

    public function downloadTemplate(Request $request,DocumentInterface $docInterface)
    {
        $data = $docInterface->parseData($request->id,$request->myVars);
        $doc = NewDocument::find($request->id);
        $this->data['data'] = $data;
        $this->data['name'] = $doc->name;
        $pdf = PDF::loadView('frontend.pdf.newTemplate', $this->data);
        return $pdf->download($doc->name.'.pdf');
    }

    public function invoice()
    {
        $this->data['data'] = Admin::where('id', Auth::guard('webadmin')->user()->id)->with('profile')->first();
        return view('backend.adminlte.documents.invoice', $this->data);
    }

    public function types()
    {
        $this->data['data'] = DocumentType::orderBy('id', 'DESC')->get();
        
        return view('backend.adminlte.documents.types', $this->data);
    }

    public function storeType(Request $request)
    {
        DocumentType::create($request->all());
        return 1;
    }
    public function destroyType(Request $request)
    {
        DocumentType::find($request->id)->delete();
        return 1;
    }
    public function editType(Request $request)
    {
        $type = $request->prop;
        $doc = DocumentType::find($request->id);
        $doc->$type  = $request->value;
        $doc->save();
        return 1;
    }

    public function download_invoice(Request $request)
    {
        $this->data['data'] = $request->all();        
        $pdf = PDF::loadView('frontend.pdf.invoice', $this->data);
        return $pdf->download('Order #'.$request->order_id.'.pdf');
    }

    public function service_contract()
    {
        return view('backend.adminlte.documents.service_contract');
    }

    public function download_service_contract(Request $request)
    {
        $this->data['data'] = $request->all();

        $pdf = PDF::loadView('frontend.pdf.service_contract', $this->data);
        return $pdf->download('Dienstleistungsvertrag.pdf');
    }
}
