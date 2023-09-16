<?php

namespace App\Http\Controllers;

use App\Repositories\PropetyRepository;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $propetyRepository;

    public function __construct(PropetyRepository $propetyRepository)
    {
        $this->propetyRepository = $propetyRepository;
    }
    public function index(Request $request)
    {
        $search = $request->search;
        $data = $this->propetyRepository->getAllRecords();

        if ($search) {
            $data->where(function ($query) use ($search) {
                $query->orWhere('number_of_bedrooms', 'like', '%'. $search . '%');
                $query->orWhere('price', 'like', '%'. $search . '%');
                $query->orWhere('property_type', 'like', '%'. $search . '%');
                $query->orWhere('type', 'like', '%'. $search . '%');
            });
        }

        $total = $data->count();

        $data = $data->paginate(20);

        return view('index', compact('data', 'search', 'total'));
    }

    public function remove(int $propid)
    {
        $remove = $this->propetyRepository->remove($propid);

        if($remove)
        {
            return redirect()->back()->with('success','Successfully removed');
        }else
        {
            return redirect()->back()->with('error','Something went wrong try again please');
        }
    }
}
