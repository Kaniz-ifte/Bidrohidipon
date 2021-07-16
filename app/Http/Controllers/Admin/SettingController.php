<?php


namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Setting;
use \stdClass;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:crud-list|crud-create|crud-edit|crud-delete', ['only' => ['index','store']]);
         $this->middleware('permission:crud-create', ['only' => ['create','store']]);
         $this->middleware('permission:crud-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:crud-delete', ['only' => ['destroy']]);
         $this->key_word='Setting';
         $this->key_word_plural='Settings';
         $this->route_index='admin.settings.index';
         $this->route_create='admin.settings.create';
         $this->route_edit='admin.settings.edit';
         $this->route_update='admin.settings.update';
         $this->route_destroy='admin.settings.destroy';
         $this->route_store='admin.settings.store';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         // return dd($this);
        $page_title = $this->key_word;
        $info=new stdClass();
        $info->title = $this->key_word_plural;
        $info->first_button_title = 'Add '.$this->key_word;
        $info->first_button_route = $this->route_create;
        $info->description = 'These  all are '.$this->key_word_plural;

        $perPage = request('perPage', 20);

        $data = Setting::orderBy('id','DESC')->paginate($perPage);


        $info->table_columns=[
             [
                  "title"=>"Serial",
                  "index"=>'serial',
                  "design"=>'1'
             ],
             [
                  "title"=>"Key",
                  "index"=>'key',
                  "design"=>'7'
             ],
             [
                  "title"=>"Value",
                  "index"=>'value',
                  "design"=>'7'
             ],

             [
                  "title"=>"Is Active",
                  "index"=>'is_active',
                  "design"=>'5'
             ],
             [
                  "title"=>"Actions",
                  "design"=>'2',
                  "show-route"=>$this->route_index,
                  "edit-route"=>$this->route_edit,
                  "destroy-route"=>$this->route_destroy,
             ],
        ];

        return view('admin.cruds.index',compact('page_title','data','info'))->with('i', ($request->input('page', 1) - 1) * $perPage);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $page_title = $this->key_word;
        $info=new stdClass();
        $info->title = $this->key_word_plural;
        $info->first_button_title = 'All '.$this->key_word;
        $info->first_button_route = $this->route_index;
        $info->form_route = $this->route_store;

        $info->form_inputs=[
             [
                 "title"=>"Key:",
                 "placeholder"=>"Enter Key",
                 "name"=>'key',
                 "required"=>'',
                 "design"=>'1',
             ],
             [
                 "title"=>"Value:",
                 "placeholder"=>"Enter Value",
                 "name"=>'value',
                 "required"=>'',
                 "design"=>'1',
             ],

             [
                  "title"=>"Is Active:",
                  "name"=>'is_active',
                  "checked"=>'1',
                  "design"=>'5'
             ],

        ];
        return view('admin.cruds.create',compact('page_title','info'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

        ]);

        $row = new Setting($request->except(['_token']));



        $row->save();

        return redirect()->route($this->route_index)
                        ->with('success',$this->key_word.' created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route($this->route_index);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

          $page_title = $this->key_word;
          $info=new stdClass();
          $info->title = $this->key_word_plural;
          $info->first_button_title = 'Add '.$this->key_word;
          $info->first_button_route = $this->route_create;
          $info->second_button_title = 'All '.$this->key_word;
          $info->second_button_route = $this->route_index;
          $info->form_route = $this->route_update;

          $data=Setting::where('id',$id)->first();

          $info->form_inputs=[
            [
                "title"=>"Key:",
                "placeholder"=>"Enter Key",
                "name"=>'key',
                "required"=>'',
                "disabled"=>'',
                "design"=>'1',
                "update"=>'',
            ],
            [
                "title"=>"Value:",
                "placeholder"=>"Enter Value",
                "name"=>'value',
                "required"=>'',
                "design"=>'1',
                "update"=>'',
            ],

            [
                 "title"=>"Is Active:",
                 "name"=>'is_active',
                 "checked"=>'1',
                 "update"=>'',
                 "design"=>'5'
            ],

         ];

          return view('admin.cruds.edit',compact('page_title','info','data'))->with('id',$id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


      $this->validate($request, [
      ]);

      $row = Setting::find($id);
      $row->fill($request->except(['_token']));
      $row->save();



        return redirect()->route($this->route_index)
                        ->with('success',$this->key_word.' updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Setting::where('id',$id)->delete();
        return redirect()->route($this->route_index)
                        ->with('success',$this->key_word.' deleted successfully');
    }
}
