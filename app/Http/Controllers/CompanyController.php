<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Companies;

class CompanyController extends Controller
{
    public function index()
    {
        //$companies = Companies::all();
		$companies = Companies::paginate(10);
        return view('company_index', compact('companies'));
    }
	public function create()
    {
        return view('company_create');
    }
	public function store(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'email' => '',
            'website' => '',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
		if ($image = $request->file('logo')) {
            $destinationPath = public_path('public');
		    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
			 $storeData['logo'] = "$profileImage";
        }
	//dd($destinationPath);
        $companies = Companies::create($storeData);

        return redirect('/companies')->with('completed', 'New Company created successfully..!');
    }
	public function edit($id)
    {
        $companies = Companies::findOrFail($id);
        return view('company_update', compact('companies'));
    }
	public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => '',
            'website' => '',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
		if ($image = $request->file('logo')) {
            $destinationPath = public_path('public');
		    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
			$data['logo'] = "$profileImage";
		}
        Companies::whereId($id)->update($data);
        return redirect('/companies')->with('completed', 'Company updated successfully..!');
    }
	public function destroy($id)
    {
        $companies = Companies::findOrFail($id);
        $companies->delete();
        return redirect('/companies')->with('completed', 'Company deleted..!');
    }  
	
}
