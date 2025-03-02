<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Recommend;
use App\Models\Room;
use App\Models\Material;
use App\Models\Tool;
use App\Models\Employee;
use App\Models\RoomDetail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class RoomController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'room_name' => 'required|string|max:255',
            'status' => 'required|string',
            'major_name' => 'required|string|max:255',
            'faculty_name' => 'required|string|max:255',
            'total_tools' => 'required|integer|min:0',
            'total_materials' => 'required|integer|min:0',
        ]);

        Room::create($validatedData);

        return redirect()->route('admin.ruangan.index')->with('success', 'Room berhasil ditambahkan!');
    }

    public function edit(Room $room)
    {
        return view('admin.pages.room.update', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        // dd($request->all());
        // dd($room);
        $validatedData = $request->validate([
            'room_name' => 'required|string|max:255',
            'status' => 'required|string',
            'major_name' => 'required|string|max:255',
            'faculty_name' => 'required|string|max:255',
        ]);


        $room->update($validatedData);

        return redirect()->route('admin.ruangan.index')->with('success', 'Room berhasil diperbarui!');
    }

    public function destroy(Room $id)
    {
        $id->delete();

        return redirect()->route('admin.ruangan.index')->with('success', 'Room berhasil dihapus!');
    }

    public function faculty($faculty)
    {
        $faculty_rooms = Room::where('faculty_name', $faculty)->get();

        $total = $faculty_rooms->count();

        return view('user.pages.faculty', compact('faculty_rooms', 'faculty', 'total'));
    }

    public function major($major, $filter)
    {
        $room = Room::findOrFail($major);
        $list_rooms = $room->where('faculty_name', $room->faculty_name);
        $details = RoomDetail::where('room_id', $major);

        $recommends = Cart::where('user_id', auth()->id())->get();
        $relations = collect();
        $overs = collect();

        if ($filter == 'material') {
            $details = $details->where('tool_id', '=', 0)->where('room_id', $major);
        } else {
            $details = $details->where('material_id', '=', 0)->where('room_id', $major);
        }

        foreach ($recommends as $recommend) {
            if ($filter == 'material') {
                if ($recommend->material_id != 0) {
                    $overs = Recommend::where('material_id', $recommend->material_id)->get();
                }

                if ($overs != null) {
                    $relations = $relations->merge($overs);
                }
            } else {
                if ($recommend->tool_id != 0) {
                    $overs = Recommend::where('tool_id', $recommend->tool_id)->get();
                }

                if ($overs != null) {
                    $relations = $relations->merge($overs);
                }
            }
        }

        $current = 'first';
        $recommendations = collect();

        foreach ($relations as $relation) {
            if ($relation->relation != $current) {
                if ($filter == 'material') {
                    $recommendation = Recommend::where('relation', $relation->relation)->where('material_id', '!=', 0)
                        ->inRandomOrder()
                        ->take(1)
                        ->get();

                    $recommendations = $recommendations->merge($recommendation);
                } else {
                    $recommendation = Recommend::where('relation', $relation->relation)->where('tool_id', '!=', 0)
                        ->inRandomOrder()
                        ->take(1)
                        ->get();

                    $recommendations = $recommendations->merge($recommendation);
                }
            }

            $current = $relation->relation;
        }

        $details = $details->paginate(8);

        return view('user.pages.tools', compact('room', 'details', 'list_rooms', 'filter', 'major', 'recommendations', 'recommends'));
    }

    public function admin_product()
    {
        $materials = Material::where('id', '!=', 0)->paginate(10, ['*'], 'materials_page');
        $tools = Tool::where('id', '!=', 0)->paginate(10, ['*'], 'tools_page');

        return view('admin.pages.product.index', compact('materials', 'tools'));
    }

    public function admin_room()
    {
        $rooms = Room::all();

        return view('admin.pages.room.index', compact('rooms'));
    }

    public function admin_room_detail()
    {
        $employee = Employee::where('user_id', auth()->id())->first();

        if (!$employee) {
            abort(404, 'Employee not found.');
        }

        $major = $employee->room->major_name;

        $list_room_ids = Room::where('major_name', $major)->pluck('id');

        $materials = RoomDetail::whereIn('room_id', $list_room_ids)
            ->where('material_id', '!=', 0)
            ->paginate(10, ['*'], 'materials_page');

        $tools = RoomDetail::whereIn('room_id', $list_room_ids)
            ->where('tool_id', '!=', 0)
            ->paginate(10, ['*'], 'tools_page');

        return view('admin.pages.room.detail.index', compact('materials', 'tools', 'major'));
    }

    public function admin_room_detail_one(Room $room)
    {
        $materials = RoomDetail::where('room_id', $room->id)
            ->where('material_id', '!=', 0)
            ->paginate(10, ['*'], 'materials_page');

        $tools = RoomDetail::where('room_id', $room->id)
            ->where('tool_id', '!=', 0)
            ->paginate(10, ['*'], 'tools_page');

        return view('admin.pages.room.detail.index', compact('materials', 'tools', 'room'));
    }

    public function admin_room_detail_create(Room $room, $type)
    {
        $materials = Material::whereNotIn('id', function ($query) use ($room) {
            $query->select('material_id')
                ->from('room_details')
                ->where('room_id', $room->id);
        })->get();

        $tools = Tool::whereNotIn('id', function ($query) use ($room) {
            $query->select('tool_id')
                ->from('room_details')
                ->where('room_id', $room->id);
        })->get();

        return view('admin.pages.room.detail.create', compact('room', 'materials', 'tools', 'type'));
    }

    public function storeRoomDetail(Request $request)
    {
        $validatedData = $request->validate([
            'room_id' => 'required|integer|exists:rooms,id',
            'tool_id' => 'required|exists:tools,id',
            'material_id' => 'required|exists:materials,id',
            'total_stocks' => 'required|integer|min:1',
            'current_stocks' => 'required|integer|min:0|max:' . $request->total_stocks,
        ]);

        if (!$request->filled('tool_id') && !$request->filled('material_id')) {
            return redirect()->back()
                ->withErrors('Pilih salah satu antara Tool atau Material.');
        }

        RoomDetail::create($validatedData);

        $roomId = $validatedData['room_id'];

        $totalMaterials = RoomDetail::where('room_id', $roomId)
            ->where('material_id', '!=', 0)
            ->count();

        $totalTools = RoomDetail::where('room_id', $roomId)
            ->where('tool_id', '!=', 0)
            ->count();

        $room = Room::find($roomId);
        $room->update([
            'total_materials' => $totalMaterials,
            'total_tools' => $totalTools,
        ]);

        return redirect()->back()
            ->with('success', 'Barang pada room detail berhasil ditambahkan dan data room diperbarui!');
    }

    public function updateRoomDetail(RoomDetail $room, Request $request)
    {
        $validatedData = $request->validate([
            'total_stocks' => 'required|integer|min:1',
            'current_stocks' => 'required|integer|min:0|max:' . $request->total_stocks,
        ]);

        $room->update($validatedData);

        return redirect()->back()
            ->with('success', 'Barang pada room detail berhasil diubah dan data room diperbarui!');
    }

    public function destroyRoomDetail(RoomDetail $room)
    {
        // dd($room->all());
        $roomId = $room->room_id;
        $room->delete();

        $totalMaterials = RoomDetail::where('room_id', $roomId)
            ->where('material_id', '!=', 0)
            ->count();

        $totalTools = RoomDetail::where('room_id', $roomId)
            ->where('tool_id', '!=', 0)
            ->count();

        $room = Room::find($roomId);

        $room->update([
            'total_materials' => $totalMaterials,
            'total_tools' => $totalTools,
        ]);

        return redirect()->back()
            ->with('success', 'Barang pada room detail berhasil dihapus dan data room diperbarui!');
    }

    public function admin_product_update($filter, $id)
    {
        if ($filter == 'material') {
            $data = Material::findOrFail($id);
        } else {
            $data = Tool::findOrFail($id);
        }

        return view('admin.pages.product.update', compact('data', 'filter'));
    }

    public function generatePDF($roomId)
    {
        // Ambil data room berdasarkan ID
        $room = Room::findOrFail($roomId);

        // Ambil materials dan tools berdasarkan room_id
        $materials = RoomDetail::where('material_id', '!=', 0)->where('room_id', $roomId)->get();
        $tools = RoomDetail::where('tool_id', '!=', 0)->where('room_id', $roomId)->get();

        // Load view menggunakan mPDF
        $html = view('user.components.generate-pdf.room', compact('room', 'materials', 'tools'))->render();

        // Setup mPDF
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);

        // Download file PDF dengan nama laravel_demo.pdf
        $mpdf->Output('detail_' . $room->room_name . '_' . $room->major_name . '.pdf', \Mpdf\Output\Destination::DOWNLOAD);

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back();
    }


}
