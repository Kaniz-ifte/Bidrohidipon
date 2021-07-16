<?php
function PermissionsByRole($role_id)
     {

          $permissions=\DB::table('role_has_permissions')->join('permissions','permissions.id','role_has_permissions.permission_id')->select('permissions.name')->where('role_has_permissions.role_id',$role_id)->get()->toArray();
          return $permissions;

     }

function ExportData($columns, $indexes, $rows, $format){
     $data=array();
     array_push($data,$columns);

     foreach($rows as $row)
    {

          $item=array();

          for($i=0;$i<count($columns);$i++){
               $item[$columns[$i]]=$row->{$indexes[$i]};

          }

          array_push($data,$item);

    }

    // return dd($data);

    return \Excel::download(new \App\CollectionExport($data), date("Y-m-d h:i:s").'_result.'.$format);


}
function YoutubeUrltoId($url)
{
    $pattern = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
    preg_match($pattern, $url, $matches);
    return (isset($matches[1])) ? $matches[1] : false;
}

function StringToSlug($string){
   return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
}


function Setting($key){

     return \App\Setting::where('key',$key)->first();

}


function Background($section){

     return \App\Background::where('section',$section)->first();

}

function Users(){

     return \App\User::orderby('id', 'DESC')->get();

}
function Admins(){

     return \App\Admin::orderby('id', 'DESC')->get();

}

function Roles()
{
     return \App\Role::orderby('id', 'DESC')->get();
}
function Backgrounds()
{
     return \App\Role::orderby('id', 'DESC')->get();
}
function Abouts()
{
     return \App\About::orderby('order', 'ASC')->get();
}

function Categories()
{
     return \App\Category::orderby('order', 'ASC')->get();
}

function Cinemas($category_id)
{

  if ($category_id!='') {

    return $cinema=DB::table('cinemas')->where('category_id',$category_id)->orderBy('order','ASC')->get();

  }else{

    return $cinema=DB::table('cinemas')->orderBy('order','ASC')->get();

  }

}

function Stills()
{
  return $stills=DB::table('stills')->orderBy('order','ASC')->get();
}
function Mentions()
{
  return $mentions=DB::table('mentions')->orderBy('order','ASC')->get();
}
function Blogs()
{
  return $blogs=DB::table('blogs')->orderBy('order','ASC')->get();
}
function SocialMedia()
{
  return $blogs=DB::table('social_media')->orderBy('order','ASC')->get();
}


function TrimString($text, $maxchar, $end='...') {

     if (strlen($text) > $maxchar) {
          $words = preg_split('/\s/', $text);
          // return dd($text);
          $output = '';
          $i = 0;
          while (1) {
               $length = strlen($output)+strlen($words[$i]);

               if ($length > $maxchar) {
                    if ($i>0) {
                         break;
                    }else{
                         $output=substr($words[$i], 0, $maxchar);
                         break;
                    }
               }
               else {
                    $output .= " " . $words[$i];
                    ++$i;
               }

          }
          $output .= $end;
     }
     else {
          $output = $text;
     }

     return $output;

}


function ModelData($model_name)
{
     return app($model_name)->where('is_active', 1)->orderby('order', 'ASC')->get();
}


 function IsActiveSession($user_id,$my_session){

     $user=\App\User::where('id',$user_id)->select('active_session')->first();
     // return dd($user->active_session);
     if ($user!='') {

          if($user->active_session==""||$user->active_session==$my_session){

              return "true";

          }else{

              return "false";

          }


     }else{
          return "false";
     }



}


function CleanTitle($title)
     {
          $clean_title=$title;

          $title_explode=explode("(",$title);
          if (isset($title_explode) && isset($title_explode[0])) {
               $clean_title=$title_explode[0];
          }
          return $clean_title;
     }



function UserInfo($user_id)
     {
          return \DB::table('users')
          ->where('id', $user_id)->first();
     }

function User(){

     return Auth::User();

}


function Role($id)
{
     return \App\Role::where('id', $id)->first();
}

function RoleByName($name)
{
     return \App\Role::where('name', $name)->first();
}

function RoleCheck($user_id)
{
     return \App\RoleUser::where('user_id', $user_id)->first();
}


function RoleByUserId($user_id)
{

     return \DB::table('users')
     ->join('role_user', 'role_user.user_id', '=', 'users.id')
     ->join('roles', 'roles.id', '=', 'role_user.role_id')
     ->where('users.id',$user_id)->first();
}


function MyRole($user_id)
{

     $role= \DB::table('users')
     ->join('role_user', 'role_user.user_id', '=', 'users.id')
     ->join('roles', 'roles.id', '=', 'role_user.role_id')
     ->select('roles.name')
     ->where('users.id',$user_id)->first();

     if (isset($role) && isset($role->name)) {
          return $role->name;
     }else{
          return "";
     }
}




function MyAsideMenu()
{
     // Aside menu
     return [

          // Dashboard
          [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'flaticon2-graphic-1',
            'page' => 'admin/dashboard',
            'new-tab' => false,
          ],
          // About me
          [
            'title' => 'Abouts',
            'root' => true,
            'icon' => 'flaticon2-avatar',
            'page' => 'admin/abouts',
            'new-tab' => false,
          ],
          // Background
          [
            'title' => 'Backgrounds',
            'root' => true,
            'icon' => 'flaticon2-avatar',
            'page' => 'admin/backgrounds',
            'new-tab' => false,
          ],
          // Category
          [
            'title' => 'Categories',
            'root' => true,
            'icon' => 'flaticon2-graphic-1',
            'page' => 'admin/categories',
            'new-tab' => false,
          ],
          // Cinematography
          [
            'title' => 'Cinemas',
            'root' => true,
            'icon' => 'flaticon2-graphic-1',
            'page' => 'admin/cinemas',
            'new-tab' => false,
          ],
          // stills
          [
            'title' => 'Stills',
            'root' => true,
            'icon' => 'flaticon2-cube',
            'page' => 'admin/stills',
            'new-tab' => false,
          ],

          // MENTIONS
          [
            'title' => 'Mentions',
            'root' => true,
            'icon' => 'flaticon2-psd',
            'page' => 'admin/mentions',
            'new-tab' => false,
          ],
          // Blogs
          [
            'title' => 'Blogs',
            'root' => true,
            'icon' => 'flaticon-confetti',
            'page' => 'admin/blogs',
            'new-tab' => false,
          ],

          //social media
          [
            'title' => 'Social Media',
            'root' => true,
            'icon' => 'flaticon-confetti',
            'page' => 'admin/social_media',
            'new-tab' => false,
          ],

          // Custom
          [
            'section' => 'Admin Controls',
          ],


          // Setting
          [
            'title' => 'Admin',
            'root' => true,
            'icon' => 'flaticon2-user-1',
            'page' => 'admin/admins',
            'new-tab' => false,
          ],

          // Setting
          [
            'title' => 'Setting',
            'root' => true,
            'icon' => 'flaticon2-gear',
            'page' => 'admin/settings',
            'new-tab' => false,
          ],

          // Logout
          [
            'title' => 'Logout',
            'root' => true,
            'icon' => 'fas fa-sign-out-alt',
            'page' => 'admin/logout',
            'new-tab' => false,
          ],

     ];

}




?>
