<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Telephone;
use DB;
use App\Http\Controllers\Controller;
class TelephoneController extends Controller{
public function contactUS(){
return view('insert');
}
public function viewresult(Request $request){

	$users = Telephone::orderBy('name', 'asc')->paginate(5);
	return view('result',['users'=>$users]);

}
public function alphabet(Request $request){
   $users = Telephone::where('name','LIKE',$request->alphabet."%")->paginate(5);
   return view('result',['users'=>$users]);

}
public function contactUSPost(Request $request){
	$this->validate($request, [
        'name' => 'required',
        'phonenumber' => 'sometimes',
        'mobile' => 'sometimes'
        ]);
Telephone::create($request->all());
return  back()->with('success', 'Contact Added!');
}
public function Delete( $id){
        $nCard= Telephone::find($id);
        $nCard->delete();
        return back()->with('success', 'Contact Deleted Successfully');

}
 public function update(Request $request,$id){
  
    $user = Telephone::find($id);
   return view('telephone',['users'=>$user]);
}
public function updaterecord(Request $request){
  if ($request->isMethod('post')) {
     $user = Telephone::find($request->id);
      $user->name = $request->name;
    $user->phonenumber = $request->phonenumber;
    $user->mobile = $request->mobile;
    $user->save();
    return back()->with('success', 'Contact updated!');
   }
}
public function search(Request $request)
{
if($request->ajax())
{
 
$output="";
 
$results=Telephone::where('name','LIKE','%'.$request->search."%")->orderBy('name', 'asc')->get();
 // return view('result',['users'=>$results]);
if($results)
{
foreach ($results as $contact) {
 $output.='<tr>'.
 '<td>'.$contact->name.'</td>'.
 '<td>'.$contact->phonenumber.'</td>'.
 '<td>'.$contact->mobile.'</td>'.
 '<td>'.$contact->id.'</td>'.
 '<td>'.
                
                    '<a data-toggle="tooltip" id="update" data-placement="top" title="Edit"  data-rel="popup" class="btn btn-default btn-xs" href = "update/'.$contact->id.' " ><span class="glyphicon glyphicon-edit"></span></a>
                    
                   '.'
                    <a data-toggle="tooltip" data-placement="top"  title="Delete" type="submit" class="btn btn-danger btn-xs" onclick="alertfunction()" href = "delete/'.$contact->id.' "><span class="glyphicon glyphicon-remove" ></span></a>

                   '.
                
            '</td>'
 ;
}
return Response($output);
    }
   }
}
}