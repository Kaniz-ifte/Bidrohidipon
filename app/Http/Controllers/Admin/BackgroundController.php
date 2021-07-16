<?php


namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Background;
use \stdClass;


class BackgroundController extends Controller
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
         $this->key_word='Background';
         $this->key_word_plural='Backgrounds';
         $this->route_index='admin.backgrounds.index';
         $this->route_create='admin.backgrounds.create';
         $this->route_edit='admin.backgrounds.edit';
         $this->route_update='admin.backgrounds.update';
         $this->route_destroy='admin.backgrounds.destroy';
         $this->route_store='admin.backgrounds.store';

         $row_1 = new stdClass();
         $row_1->id = 'home-section';
         $row_1->section = 'Home Section';


         $row_2 = new stdClass();
         $row_2->id = 'about-section';
         $row_2->section = 'About Section';


         $row_3 = new stdClass();
         $row_3->id = 'cinematography-section';
         $row_3->section = 'Cinematography Section';


         $row_4 = new stdClass();
         $row_4->id = 'still-section';
         $row_4->section = 'Still Section';


         $row_5 = new stdClass();
         $row_5->id = 'blog-section';
         $row_5->section = 'Blog Section';


         $row_6 = new stdClass();
         $row_6->id = 'mention-section';
         $row_6->section = 'Mention Section';


        $row_7= new stdClass();
        $row_7->id = 'contact-section';
        $row_7->section = 'Contact Section';


        $row_8= new stdClass();
        $row_8->id = 'home-section-video';
        $row_8->section = 'Home  Section video';


        $row_9= new stdClass();
        $row_9->id = 'share-banner';
        $row_9->section = 'Share Banner';


        $row_10= new stdClass();
        $row_10->id = 'favicon';
        $row_10->section = 'Favicon';



         $this->sections = array($row_1, $row_2,$row_3,$row_4,$row_5,$row_6,$row_7,$row_8,$row_9,$row_10);
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

        $data = Background::orderBy('id','DESC')->paginate($perPage);


        $info->table_columns=[
             [
                  "title"=>"Serial",
                  "index"=>'serial',
                  "design"=>'1'
             ],
             [
                  "title"=>"Section",
                  "index"=>'section',
                  "design"=>'7'
             ],

             [
                  "title"=>"Banner",
                  "index"=>'banner',
                  "design"=>'11'
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
                  "title"=>"Section:",
                  "placeholder"=>"Enter Section",
                  "name"=>'section',
                  "index"=>'section',
                  "data"=>$this->sections,
                  "required"=>'',
                  "design"=>'6'
             ],
             [
                   "title"=>"Banner:",
                   "id"=>'image_1',
                   "sample_image"=>'media/sample/background.jpg',
                   "sample_image_width"=>'160px',
                   "sample_image_height"=>'120px',
                   "name"=>'banner',
                   "design"=>'3'
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

        $row = new Background($request->except(['_token','banner']));

        $image=$request->banner;
        $image_name='';

        if($image!=''){

             $serial=Background::max('id') + 1;

             $path='storage/'.$this->key_word_plural.'/'.$this->key_word.'_'.$serial.'.'.$image->getClientOriginalExtension();

             if(in_array($image->getClientOriginalExtension(), array('jpg','png','gif'))){
                 $image_name=app('App\Http\Controllers\FileController')->SaveImage($image,$path);
            }else{
                 $image->move(base_path('public/storage/'.$this->key_word_plural), $this->key_word.'_'.$serial.'.'.$image->getClientOriginalExtension());
                 $image_name=$path;
            }

             $row->banner=$image_name;
        }


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

          $data=Background::where('id',$id)->first();

          $info->form_inputs=[
            [
                "title"=>"Section:",
                "placeholder"=>"Enter Section",
                "name"=>'section',
                "index"=>'section',
                "data"=>$this->sections,
                "required"=>'',
                "design"=>'6',
                "update"=>'',
            ],
            [
                  "title"=>"Banner:",
                  "id"=>'image_1',
                  "sample_image"=>'media/sample/background.jpg',
                  "sample_image_width"=>'160px',
                  "sample_image_height"=>'120px',
                  "name"=>'banner',
                  "update"=>'1',
                  "design"=>'3'
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

      $row = Background::find($id);
      $row->fill($request->except(['_token','banner']));



      $image=$request->banner;
      $image_name='';

      if($image!=''){

           $serial=$id;

           $path='storage/'.$this->key_word_plural.'/'.$this->key_word.'_'.$serial.'.'.$image->getClientOriginalExtension();
           if(in_array($image->getClientOriginalExtension(), array('jpg','png','gif'))){
                $image_name=app('App\Http\Controllers\FileController')->SaveImage($image,$path);
           }else{
                $image->move(base_path('public/storage/'.$this->key_word_plural), $this->key_word.'_'.$serial.'.'.$image->getClientOriginalExtension());
                $image_name=$path;
           }

           $row->banner=$image_name;
      }


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
        Background::where('id',$id)->delete();
        return redirect()->route($this->route_index)
                        ->with('success',$this->key_word.' deleted successfully');
    }
}
