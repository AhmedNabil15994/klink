<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\LanguageFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use \Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\File;
use App\Models\Backend\Emails;
use App;
use PharIo\Manifest\Email;

class LanguageFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = LanguageFiles::orderBy('is_main', 'DESC')->get();
        return view('backend.adminlte.languages.language', compact('languages'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $rules = [
            'name'=>'required|unique:language_files',
            'shortcut'=>'required|max:3|unique:language_files',
            'is_active'=>'required',
            'imageTemp'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        $mainLanguage = LanguageFiles::where('is_main', 1)->first()['shortcut'];
        if (!$mainLanguage) {
            $mainLanguage = LanguageFiles::create([
                'name'=>'german',
                'shortcut'=>'de',
                'is_main'=>1,
                'is_active'=>1
            ])['shortcut'];
            LanguageFiles::create([
                'name'=>'english',
                'shortcut'=>'en',
                
                'is_main'=>1,
                'is_active'=>1
            ]);
        }
        $url = '/images/translate.svg';
        if (request()->hasFile('imageTemp')) {
            $file = request()->file('imageTemp');
            $imageName = request()->shortcut.'.'.$file->getClientOriginalExtension();
            $newPath = public_path('/images/flags');
            $file->move($newPath, $imageName);
            $url = '/images/flags/'.$imageName;
            // $path = $file->store('languages');
            // $url = Storage::url($path);
            // return $newPath;
        }
        $resources_path = resource_path('lang/'.$mainLanguage);
        File::copyDirectory($resources_path, resource_path('lang/'.request('shortcut')));
        LanguageFiles::create(array_merge(request()->all(), ['image' => $url]));
        $emails = Emails::all();
        foreach ($emails as $email) {
            $emailSubject = json_decode($email->subject, true);
            $emaillayout = json_decode($email->layout, true);
            $emailSubject[request()->shortcut] = $emailSubject[$mainLanguage];
            $emaillayout[request()->shortcut] = $emaillayout[$mainLanguage];
            $email->update([
                'subject'=>json_encode($emailSubject),
                'layout'=>json_encode($emaillayout)
            ]);
        }
        return 1;
        /* replacing all of that with the above one line */
        // $shortcut = request()->shortcut;
        // return $this->createFolder($resources_path, $shortcut, $mainLanguage);
        
        // return request()->all();
    }
    // public function createFolder($path, $shortcut, $mainLanguage)
    // {
    //     $files = $this->getFiles($path);
    //     $oldDirectory = resource_path('lang/'.$mainLanguage);
    //     $newDirectoryName = str_replace($oldDirectory, '', $path);
    //     $newDirectoryName = resource_path('lang/'.$shortcut) . $newDirectoryName;
    //     $newDirectory = File::makeDirectory($newDirectoryName, 0775, true, true);
    //     // return 'ahmed';
    //     foreach ($files as $file) {
    //         $name = pathinfo($file);
    //         $oldPath = $name['dirname'].'/'.$name['basename'];
    //         $name['dirname'] = str_replace($oldDirectory, resource_path('lang/'.$shortcut), $name['dirname']);
    //         $fullPath = $name['dirname'].'/'.$name['basename'];
    //         // $length = strlen('.php');
            
    //         if (isset($name['extension'])) {
    //             if (!(File::exists($fullPath))) {
    //                 /* replacing all of this with only one line :( sad and happy in the same time */
    //                 // $content = require $file;
    //                 // $content = '<?php return'.json_encode($content).';endOfFile';
    //                 // $content = str_replace('":"', '" => "', $content);
    //                 // $content = str_replace('return{"', PHP_EOL.'   return['.PHP_EOL.'      "', $content);
    //                 // $content = str_replace('","', '",'.PHP_EOL.'      "', $content);
    //                 // $content = str_replace('};endOfFile', PHP_EOL.'    ];', $content);
    //                 // File::put($fullPath, $content);
    //                 File::copy($file, $fullPath);
    //             }
    //         } else {
    //             // $this->createFolder($oldPath, $shortcut, $mainLanguage);
    //         }
    //     }
    //     // foreach ($files as $file) {
    //     // }
    //     return 'ahmed';
    // }
    /**
     * Display the specified resource.
     *
     * @param  \App\LanguageFiles  $languageFiles
     * @return \Illuminate\Http\Response
     */
    public function refreshTranslation()
    {
        $languages = LanguageFiles::orderBy('is_main', 'DESC')->get();
        
        $languageShortCuts = $languages->pluck('shortcut')->toArray();
        // return $languageShortCuts;
        return $this->compareDirectories($languageShortCuts);
    }
    public function compareDirectories($shortPaths)
    {
        $filesList = [];
        foreach ($shortPaths as $path) {
            $files = $this->getFiles(resource_path('lang/'.$path));
            foreach ($files as $file) {
                if (!isset($filesList[basename($file)])) {
                    $filesList[basename($file)] = [];
                }
                array_push($filesList[basename($file)], $path);
            }
        }
        $OriginalPath = resource_path('lang');
        foreach ($filesList as $file=>$foundIn) {
            $difference = array_diff($shortPaths, $foundIn);
            $newShorts = [];
            foreach ($foundIn as $lang) {
                array_push($newShorts, $lang.'/'.$file);
            }
            if (substr($file, -4) == '.php') {
                $this->compareFiles($newShorts);
            } else {
                $this->compareDirectories($newShorts);
            }
            if (!empty($difference)) {
                foreach ($difference as $langDiff) {
                    $this->copyFiles($file, $OriginalPath.'/'.$foundIn[0], $OriginalPath.'/'.$langDiff);
                }
            }
        }
       
        
        return 1;
    }
    public function copyFiles($fileName, $from, $to)
    {
        $from = $from.'/'.$fileName;
        $to  = $to.'/'.$fileName;
        if (substr($fileName, -4) == '.php') {
            File::copy($from, $to);
        } else {
            File::copyDirectory($from, $to);
        }
    }
    public function compareFiles($shorts)
    {
        $generalPath = resource_path('lang');
        $arrayList = [];
        
        foreach ($shorts as $short) {
            $file = $generalPath.'/'.$short;
            $arrayOfFile = require $file;
            
            foreach ($arrayOfFile as $key=>$value) {
                if (!isset($arrayList[$key])) {
                    $arrayList[$key] = [];
                }
                array_push($arrayList[$key], $short);
            }
        }
        foreach ($arrayList as $word=>$value) {
            $difference = array_diff($shorts, $value);
            if (!empty($difference)) {
                $fileFrom = $generalPath.'/'.$value[0];
                $newValue = require $fileFrom;
                $newValue = $newValue[$word];
                foreach ($difference as $differenceFile) {
                    $this->addToFile($differenceFile, $word, $newValue);
                }
            }
        }
    }
    public function addToFile($file, $key, $value)
    {
        $generalPath = resource_path('lang');
        $file = $generalPath.'/'.$file;
        $oldData = require $file;
        if (isset($oldData[$key])) {
            return '';
        } else {
            $oldData[$key] = $value;
        }
        $oldData = json_encode($oldData, JSON_UNESCAPED_UNICODE);
        $this->UpdateFile($file, $oldData);
        return require $file;
    }
    public function editFile()
    {
        $rules = [
            'data'=>'required|json',
            'path'=>'required'
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        if (strpos(request()->path, resource_path('lang')) ===false||strpos(request()->path, '..') !==false) {
            return abort(404, 'Not Found.');
        }
        $this->UpdateFile(request('path'), request('data'));
        return 1;
    }
    public function UpdateFile($fullPath, $content)
    {
        $content = '<?php return'.$content.';endOfFile';
        $content = str_replace('":"', '" => "', $content);
        $content = str_replace('return{"', PHP_EOL.'   return['.PHP_EOL.'      "', $content);
        $content = str_replace('","', '",'.PHP_EOL.'      "', $content);
        $content = str_replace('};endOfFile', PHP_EOL.'    ];', $content);
        File::put($fullPath, $content);
    }
    public function show(LanguageFiles $languageFiles)
    {
        // return $this->showFolder('/home/admica/mywork/dibuh/kurier-link/resources/lang/de/frontend/');
        $path = resource_path('lang/'.$languageFiles['shortcut']);
        $sources =  $this->showFolder($path);
        $sources =  json_encode($sources, JSON_UNESCAPED_SLASHES);
        return view('backend.adminlte.languages.editLanguage', compact('sources', 'languageFiles'));
        return response($sources)->header('Content-Type', 'application/json');
    }
    public function showFolder($languageFiles)
    {
        // $languageFiles = request('file');
        // echo $languageFiles.'    ';
        $files = $this->getFiles($languageFiles);
        $sources = [];
        
        foreach ($files as $file) {
            $name = pathinfo($file);
            
            // $length = strlen('.php');
            
            if (isset($name['extension'])) {
                array_push($sources, ['title'=>$name['basename'],'key'=>$name['dirname'].'/'.$name['basename']]);
            } else {
                array_push($sources, ['title'=>$name['basename'],'key'=>$name['dirname'].'/'.$name['basename'],'folder'=>true,
                'children'=>$this->showFolder($name['dirname'].'/'.$name['basename'].'/')
                ]);
            }
        }
        
        return $sources;
        
        // $result = File::makeDirectory($languageFiles.'/text', 0775, true, true);
        // File::put($languageFiles.'/text/mytextdocument.txt', 'John Doe');
        // File::delete($languageFiles.'/text/mytextdocument.txt');
    }
    public function getFiles($languageFiles)
    {
        if (strpos($languageFiles, resource_path('lang')) ===false||strpos($languageFiles, '..') !==false) {
            return abort(404, 'Not Found.');
        }
        $files   = glob($languageFiles.'/*');
        return $files;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LanguageFiles  $languageFiles
     * @return \Illuminate\Http\Response
     */
    
    public function edit()
    {
        $rules = [
            'name'=>'required|unique:language_files,id,'.request()->id,
            'shortcut'=>'required|max:3|unique:language_files,id,'.request()->id,
            'is_active'=>'required',
            'id'=>'required',
            'imageTemp' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $language = LanguageFiles::where('id', request()->id)->first();
        
        $validator = Validator::make(Input::all(), $rules);
        
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        if ($language->is_main&&request('is_active')==0) {
            return Response::json([
                'errors' => ['mainLanguage'=>'this is a main language and can\'t be de-activated']
            ]);
        }
        $oldLangShortcut = $language->shortcut;
        $url = $language->image;
        if (request()->hasFile('imageTemp')) {
            // File::delete(public_path($url));
            $file = request()->file('imageTemp');
            $imageName = request()->shortcut.'.'.$file->getClientOriginalExtension();
            $newPath = public_path('/images/flags');
            $file->move($newPath, $imageName);
            $url = '/images/flags/'.$imageName;
            // $path = $file->store('languages');
            // $url = Storage::url($path);
            // return $newPath;
        }
        $language->update(array_merge(request()->all(), ['image'=>$url]));
        
        if ($oldLangShortcut!=$language->shortcut) {
            rename(resource_path('lang/'.$oldLangShortcut), resource_path('lang/'.$language->shortcut));
        }
        return 1;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LanguageFiles  $languageFiles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LanguageFiles $languageFiles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LanguageFiles  $languageFiles
     * @return \Illuminate\Http\Response
     */
    public function fileDetails()
    {
        $fileName = request()->file;
        if (strpos($fileName, resource_path('lang')) ===false||strpos($fileName, '..') !==false) {
            return abort(404, 'Not Found.');
        }
        $currentLanguage = str_replace(resource_path('lang/'), '', $fileName);
        $langPostion =  strpos($currentLanguage, '/');
        $currentLanguage  = substr($currentLanguage, $langPostion);
        $currentLanguage = resource_path('lang/'.App::getLocale()).$currentLanguage;
        
        
        return [require $currentLanguage,require $fileName];
    }
    public function destroy()
    {
        $language = LanguageFiles::where('id', request()->id)->first();
        // return $language;
        if ($language) {
            if ($language->is_main==1) {
                return response('{"errors":{"mainLanguage":["This is main language this can\'t be deleted."]}}', 403);
            }
            File::deleteDirectory(resource_path('lang/'.$language->shortcut));
            $emails = Emails::all();
            foreach ($emails as $email) {
                $emailSubject = json_decode($email->subject, true);
                $emaillayout = json_decode($email->layout, true);
                unset($emailSubject[$language->shortcut]);
                unset($emaillayout[$language->shortcut]);
                
                $email->update([
                    'subject'=>json_encode($emailSubject, JSON_UNESCAPED_UNICODE),
                    'layout'=>json_encode($emaillayout, JSON_UNESCAPED_UNICODE)
                ]);
            }
            File::delete(public_path($language->image));
            $language->delete();
        }
        return 1;
    }
}
