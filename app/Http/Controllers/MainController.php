<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequests;
use App\Repositories\PropetyRepository;
use App\Traits\Media;
use Illuminate\Http\Request;

class MainController extends Controller
{
    use Media;

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

    public function editView(string $propId)
    {
        $propId = base64_decode($propId);

        $data = $this->propetyRepository->getById($propId);

        return view('edit', compact('data'));
    }

    public function updateProperty(PropertyRequests $request)
    {
        $data = $request->all();
        $data['if_updated'] = 1;
        unset($data['_token']);

        $uploadImageData = [];

        if($request->image)
        {
            $request->validate([
                'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            ]);

            $imagePath = public_path('/images/');
            $uploadImageData =  $this->uploadImage($request->image, $imagePath);
            $data['image'] = $uploadImageData['image'];
            $data['thumbnail'] = $uploadImageData['thumbnail'];
        }

        $update = $this->propetyRepository->update($data);

        if($update)
        {
            return redirect()->back()->with('success','Successfully updated');
        }else
        {
            return redirect()->back()->with('error','Something went wrong try again please');
        }
    }
}
