<?php


namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use DB;
use App\User;
use \stdClass;


class UserController extends Controller
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
         $this->key_word='User';
         $this->key_word_plural='Users';
         $this->route_index='admin.users.index';
         $this->route_create='admin.users.create';
         $this->route_edit='admin.users.edit';
         $this->route_update='admin.users.update';
         $this->route_destroy='admin.users.destroy';
         $this->route_store='admin.users.store';
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
        $info->search = $request->search;
        $info->title = $this->key_word_plural;
        $info->first_button_title = 'Add '.$this->key_word;
        $info->first_button_route = $this->route_create;
        $info->description = 'These  all are '.$this->key_word_plural;

        $perPage = request('perPage', 20);

        $data = User::orderBy('id','DESC')
        ->where('id', 'like', '%'.$request->search.'%')
        ->orWhere('name', 'like', '%'.$request->search.'%')
        ->orWhere('phone', 'like', '%'.$request->search.'%')
        ->orWhere('email', 'like', '%'.$request->search.'%')
        ->paginate($perPage);


        $info->table_columns=[
             [
                  "title"=>"Serial",
                  "index"=>'serial',
                  "design"=>'1'
             ],
             [
                  "title"=>"Name",
                  "index"=>'avatar',
                  "index_1"=>'name',
                  "index_2"=>'id',
                  "design"=>'6'
             ],
             [
                  "title"=>"Email",
                  "index"=>'email',
                  "design"=>'7'
             ],
             [
                  "title"=>"Phone",
                  "index"=>'phone',
                  "design"=>'7'
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
                  "title"=>"Name:",
                  "placeholder"=>"Enter Name",
                  "name"=>'name',
                  "required"=>'1',
                  "design"=>'1'
             ],
             [
                  "title"=>"Avatar:",
                  "id"=>'image_1',
                  "sample_image"=>'media/sample/avatar.jpg',
                  "sample_image_width"=>'120px',
                  "sample_image_height"=>'120px',
                  "name"=>'avatar',
                  "design"=>'3'
             ],
             [
                  "title"=>"Password:",
                  "placeholder"=>"Enter Password",
                  "name"=>'password',
                  "type"=>'password',
                  "required"=>'1',
                  "design"=>'1'
             ],
             [
                  "title"=>"Email:",
                  "placeholder"=>"Enter Email",
                  "name"=>'email',
                  "type"=>'email',
                  "required"=>'1',
                  "design"=>'1'
             ],
             [
                  "title"=>"Confirm Password:",
                  "placeholder"=>"Enter Confirm Password",
                  "name"=>'password_confirmation',
                  "type"=>'password',
                  "required"=>'1',
                  "design"=>'1'
             ],
             [
                  "title"=>"Phone:",
                  "placeholder"=>"Enter Phone",
                  "name"=>'phone',
                  "required"=>'1',
                  "design"=>'1'
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
             'name' => 'required',
             'email' => 'nullable|unique:users,email',
             'phone' => 'required|unique:users,phone',
             'password' => 'nullable|confirmed|min:8',
        ]);

        $row = new User($request->except(['_token', 'password','password_confirmation', 'avatar']));

        $row->password=Hash::make($request->password);

        $image=$request->avatar;
        $image_name='';

        if($image!=''){

             $serial=User::max('id') + 1;

             $path='storage/'.$this->key_word_plural.'/'.$this->key_word.'_'.$serial.'.'.$image->getClientOriginalExtension();
             $image_name=app('App\Http\Controllers\FileController')->SaveImage($image,$path);

        }

        $row->avatar=$image_name;

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

          $data=User::where('id',$id)->first();

          $info->form_inputs=[
              [
                   "title"=>"Name:",
                   "placeholder"=>"Enter Name",
                   "name"=>'name',
                   "required"=>'',
                   "update"=>'',
                   "design"=>'1'
              ],
              [
                   "title"=>"Avatar:",
                   "id"=>'image_1',
                   "sample_image"=>'media/sample/avatar.jpg',
                   "sample_image_width"=>'120px',
                   "sample_image_height"=>'120px',
                   "name"=>'avatar',
                   "update"=>'',
                   "design"=>'3'
              ],
              [
                   "title"=>"Password:",
                   "placeholder"=>"Enter Password",
                   "name"=>'password',
                   "type"=>'password',
                   "design"=>'1'
              ],
              [
                   "title"=>"Email:",
                   "placeholder"=>"Enter Email",
                   "name"=>'email',
                   "type"=>'email',
                   "required"=>'',
                   "update"=>'',
                   "update"=>'',
                   "design"=>'1'
              ],
              [
                   "title"=>"Confirm Password:",
                   "placeholder"=>"Enter Confirm Password",
                   "name"=>'password_confirmation',
                   "type"=>'password',
                   "update"=>'',
                   "design"=>'1'
              ],
              [
                   "title"=>"Phone:",
                   "placeholder"=>"Enter Phone",
                   "name"=>'phone',
                   "required"=>'1',
                   "update"=>'',
                   "design"=>'1'
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
              'name' => 'required',
              'email' => 'nullable|unique:users,email,'.$id,
              'phone' => 'required|unique:users,phone,'.$id,
              'password' => 'nullable|confirmed|min:8',
        ]);


        $row = User::find($id);
        $row->fill($request->except(['_token', 'password','password_confirmation', 'avatar']));
        $row->password=Hash::make($request->password);

        $image=$request->avatar;
        $image_name=$request->old_avatar;

        if($image!=''){

             $serial=$id;

             $path='storage/'.$this->key_word_plural.'/'.$this->key_word.'_'.$serial.'.'.$image->getClientOriginalExtension();
             $image_name=app('App\Http\Controllers\FileController')->SaveImage($image,$path);

        }

        $row->avatar=$image_name;


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
        User::where('id',$id)->delete();
        return redirect()->route($this->route_index)
                        ->with('success',$this->key_word.' deleted successfully');
    }
}