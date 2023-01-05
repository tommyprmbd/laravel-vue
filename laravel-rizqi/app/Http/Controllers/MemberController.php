<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.member');
    }

    public function api(Request $request)
    {
        if ($request->gender) {
            $datas = Member::where('gender', $request->gender)->get();
        } else {
            $datas = Member::all();
        }
        $datatables = DataTables::of($datas)->addIndexColumn();

        return $datatables->make(true);
        // untuk menampilkan yajra datatables laraverl :
        // composer -> route web -> controller -> vue js di viewnya
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
    public function store(Request $request)
    {
        $validatedMember = $request->validate([
            'nama' => 'required|unique:members|max:255',
            'gender' => 'required',
            'phone' => 'required|unique:members|max:13',
            'address' => 'required|max:255',
            'email' => 'required|unique:members|max:255',
        ]);

        // $this->validate($request, [
        //     'nama' => ['required'],
        //     'gender' => ['required'],
        //     'phone' => ['required'],
        //     'address' => ['required'],
        //     'email' => ['required'],
        // ]);

        Member::create($request->all());
        return redirect('member');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $validatedMember = $request->validate([
            'nama' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
        ]);

        $member->update($request->all());
        return redirect('member');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect('member');
    }
}
