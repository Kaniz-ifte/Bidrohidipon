<?php





namespace App\Http\Controllers\Admin;





use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

use Illuminate\Support\Facades\Hash;

use DB;

use App\SocialMedia;

use \stdClass;





class SocialMediaController extends Controller

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

         $this->key_word='SocialMedia';

         $this->key_word_plural='SocialMedia';

         $this->route_index='admin.social_media.index';

         $this->route_create='admin.social_media.create';

         $this->route_edit='admin.social_media.edit';

         $this->route_update='admin.social_media.update';

         $this->route_destroy='admin.social_media.destroy';

         $this->route_store='admin.social_media.store';

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



        $data = SocialMedia::orderBy('id','DESC')->paginate($perPage);





        $info->table_columns=[

          [
               "title"=> 'Serial',
               "index"=> 'serial',
               "design"=> '1'
          ],
          [
               "title"=> 'Title',
               "index"=> 'icon',
               "index_1"=> 'title',
               "index_2"=> 'icon_class',
               "max_char"=>20,
               "max_char_1"=>20,
               "design"=> '6'
          ],
          [
               "title"=> 'Color/Background',
               "index"=> 'color',
               "index_1"=> 'background_color',
               "max_char"=> 20,
               "max_char_1"=> 20,
               "design"=> '3',
          ],
          [
               "title"=> 'Url',
               "index"=> 'url',
               "max_char"=>40,
               "design"=> '2'
          ],
          [
               "title"=> 'Status',
               "index"=> 'is_active',
               "index_1"=> 'order',
               "design"=> '5'
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
               "title"=> 'Title:',
               "placeholder"=> 'Enter Title',
               "name"=> 'title',
               "design"=> '1'
          ],
          [
               "title"=> 'Icon Class:',
               "placeholder"=> 'Enter Icon Class',
               "name"=> 'icon_class',
               "design"=> '1'
          ],
          [
               "title"=> 'Url:',
               "placeholder"=> 'Enter Url',
               "name"=> 'url',
               "design"=> '1'
          ],
          [
               "title"=> 'Order:',
               "placeholder"=> 'Enter Order',
               "name"=> 'order',
               "type"=> 'number',
               "design"=> '1'
          ],
          [
               "title"=> 'Is Active:',
               "name"=> 'is_active',
               "checked"=> '',
               "design"=> '5'
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

            'title' => 'required',



        ]);



        $row = new SocialMedia($request->except(['_token','banner']));



        $image=$request->banner;

        $image_name='';



        if($image!=''){



             $serial=SocialMedia::max('id') + 1;



             $path='storage/'.$this->key_word_plural.'/'.$this->key_word.'_'.$serial.'.'.$image->getClientOriginalExtension();

             $image_name=app('App\Http\Controllers\FileController')->SaveImage($image,$path);



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



          $data=SocialMedia::where('id',$id)->first();



          $info->form_inputs=[

            [
                 "title"=> 'Title:',
                 "placeholder"=> 'Enter Title',
                 "name"=> 'title',
                 "update"=> '',
                 "design"=> '1'
            ],
            [
                 "title"=> 'Icon Class:',
                 "placeholder"=> 'Enter Icon Class',
                 "name"=> 'icon_class',
                 "update"=> '',
                 "design"=> '1'
            ],
            [
                 "title"=> 'Url:',
                 "placeholder"=> 'Enter Url',
                 "name"=> 'url',
                 "update"=> '',
                 "design"=> '1'
            ],
            [
                 "title"=> 'Order:',
                 "placeholder"=> 'Enter Order',
                 "name"=> 'order',
                 "type"=> 'number',
                 "update"=> '',
                 "design"=> '1'
            ],
            [
                 "title"=> 'Is Active:',
                 "name"=> 'is_active',
                 "update"=> '',
                 "design"=> '5'
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

          'title' => 'required',



      ]);



      $row = SocialMedia::find($id);

      $row->fill($request->except(['_token','banner']));







      $image=$request->banner;

      $image_name='';



      if($image!=''){



           $serial=$id;



           $path='storage/'.$this->key_word_plural.'/'.$this->key_word.'_'.$serial.'.'.$image->getClientOriginalExtension();

           $image_name=app('App\Http\Controllers\FileController')->SaveImage($image,$path);

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

        SocialMedia::where('id',$id)->delete();

        return redirect()->route($this->route_index)

                        ->with('success',$this->key_word.' deleted successfully');

    }

}
